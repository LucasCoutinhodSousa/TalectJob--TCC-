<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: tela_login.php');
    exit;
}

$id_do_usuario = $_SESSION['id'];

// Configurações de paginação
$registrosPorPagina = 4;  // Ajuste conforme necessário
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaAtual - 1) * $registrosPorPagina;
$id_usuario ="";
// Obtém o total de registros
$queryCount = $dbh->prepare('SELECT COUNT(*) as total FROM vw_visualizaCand WHERE id=:id_do_usuario');
$queryCount->bindValue(':id_do_usuario', $id_do_usuario, PDO::PARAM_INT);
$queryCount->execute();
$totalRegistros = $queryCount->fetch(PDO::FETCH_ASSOC)['total'];
$idUsuario = $queryCount->fetchAll();
// Calcula o número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Verifica se o número total de páginas é maior que 1
if ($totalPaginas >= 1) {
    $query = $dbh->prepare('SELECT * FROM vw_visualizaCand WHERE id=:id_do_usuario LIMIT :offset, :registrosPorPagina');
    $query->bindValue(':id_do_usuario', $id_do_usuario, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->bindValue(':registrosPorPagina', $registrosPorPagina, PDO::PARAM_INT);
    $query->execute();
    $id_usuario = $query->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/candidatura.css">
    <title>Candidaturas</title>
</head>

<body>
    <header>
        <h1>Candidaturas</h1>
        <a href="../loginUsuario/phpLoginUsuario/principalcandidato.php"><img src="../img/logo.png" alt=""></a>
    </header>

    <div class="conteiner">
        <div class="vagas-to">
            <div class="links">
                <a href="">Em Andamento</a>
                <a href="" class="linha">Finalizada</a>
            </div>
            <?php
            foreach ($id_usuario as $usuario) {
                echo '<div class="vagas">';
                echo '<h1>' . $usuario['nomeFant'] . '</h1>';
                echo '<h2>' . $usuario['cargo'] . '</h2>';
                echo '<h3>' . $usuario['localVaga'] . '</h3>';
                echo '<p>' . $usuario['descricaoVaga'] . '</p>';
                echo '</div>';
            }
            ?>

            <!-- Adiciona links de paginação -->
            <div class="pagination">
                <?php
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
