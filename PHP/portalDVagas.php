<?php
include('conexao.php');

// Defina o número de itens por página
$itensPorPagina = 3;

// Obtenha o número total de vagas
$totalVagas = $dbh->query('SELECT COUNT(*) FROM cadasVagas')->fetchColumn();

// Calcule o número total de páginas
$totalPaginas = ceil($totalVagas / $itensPorPagina);

// Obtenha o número da página atual a partir do parâmetro de consulta
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$localFiltro = isset($_GET['local']) ? $_GET['local'] : '';
$areaProfissional = isset($_GET['areaProfissional']) ? $_GET['areaProfissional'] : '';

// Calcule o offset para a consulta
$offset = ($paginaAtual - 1) * $itensPorPagina;

if ($localFiltro != '' || $areaProfissional != '') {
    $query = $dbh->prepare('SELECT * FROM cadasVagas WHERE localVaga = :localVaga AND cargo = :cargo LIMIT :offset, :itensPorPagina');
    $query->bindParam(':localVaga', $localFiltro, PDO::PARAM_STR);
    $query->bindParam(':cargo', $areaProfissional, PDO::PARAM_STR);
} else {
    $query = $dbh->prepare('SELECT * FROM cadasVagas LIMIT :offset, :itensPorPagina');
}

// Consulta para obter apenas os itens da página atual
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->bindParam(':itensPorPagina', $itensPorPagina, PDO::PARAM_INT);
$query->execute();

$vagas = $query->fetchAll(PDO::FETCH_ASSOC);

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redirecione para a tela de login
    header('Location: tela_login.php');
    exit;
}

// Agora você pode acessar o ID do usuário
$id_do_usuario = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleInicial.css">
    <link rel="stylesheet" href="../CSS/portalVagas.css">
    <title>Portal de Vagas</title>
</head>

<body>
    <header>
        <a href=""><img src="" alt="">Logo</a>
        <div class="cabecalho-inicial">
            <a href="portalVagas.html">Portal de Vagas</a>
            <select name="login" id="link" onchange="location = this.value;">
                <option value="" disabled selected>Login</option>
                <option value="loginCan.html">Login Cadidato</option>
                <option value="http://www.youtube.com">Login Empresa</option>
            </select>
        </div>
    </header>
    <div class="conteiner">
        <div class="filto-to">
            <div class="filtro">
                <h1>Filtro</h1>
                <h1><?php echo $id_do_usuario?></h1>
                <form method="get" action="portalDVagas.php">
                    <select name="local" id="local" onchange="this.form.submit()">
                        <option value="" <?php echo ($localFiltro == '') ? 'selected' : ''; ?>>Todos os Locais</option>
                        <?php
                        foreach ($vagas as $local) {
                            echo '<option value="' . $local['localVaga'] . '" ' . (($localFiltro == $local['localVaga']) ? 'selected' : '') . '>' . $local['localVaga'] . '</option>';
                        }
                        ?>
                    </select>
                </form>
                <form method="get" action="portalDVagas.php">
                    <select name="areaProfissional" id="areaProfissional" onchange="this.form.submit()">
                        <option value="" <?php echo ($areaProfissional == '') ? 'selected' : ''; ?>>Área profissional</option>
                        <?php
                        foreach ($vagas as $cargo) {
                            echo '<option value="' . $cargo['cargo'] . '" ' . (($areaProfissional == $cargo['cargo']) ? 'selected' : '') . '>' . $cargo['cargo'] . '</option>';
                        }
                        ?>
                    </select>
                </form>

                <select name="" id="">
                    <option value="">Faixa Salarial</option>
                    <option value="">Faixa Salarial</option>
                    <option value="">Faixa Salarial</option>
                </select>
            </div>
        </div>
        <div class="vagas-to">
            <?php
            foreach ($vagas as $vaga) {
                echo '<div class="vagas">';
                echo '<a href="../PHP/vaga.php?id=' . $vaga['id'] . '">';
                echo '<h1>' . $vaga['cargo'] . '</h1>';
                echo '<h2>' . $vaga['localVaga'] . '</h2>';
                echo '<p>' . $vaga['descricaoVaga'] . '</p>';
                echo '</a>';
                echo '</div>';
            }
            ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                    <a href="?pagina=<?= $i ?>&local=<?= $localFiltro ?>&areaProfissional=<?= $areaProfissional ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>

</html>
