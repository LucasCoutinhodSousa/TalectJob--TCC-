<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: telaLoginEmpresa.php');
    exit;
}

$id_Empresa = $_SESSION['id'];

// Configurações de paginação
$registrosPorPagina = 5;  // Ajuste conforme necessário
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaAtual - 1) * $registrosPorPagina;

// Consulta com paginação
$busca = "SELECT * FROM vw_visualizarEmp WHERE id=:id_Empresa";

if (!empty($_GET['pesquisar'])) {
    $data = $_GET['pesquisar'];
    $busca .= " AND nome LIKE :data";
}

$query = $dbh->prepare($busca);

if (isset($data)) {
    $query->bindValue(':data', "%$data%", PDO::PARAM_STR);
}

$query->bindValue(':id_Empresa', $id_Empresa, PDO::PARAM_INT);
$query->execute();

// Obtenha todos os resultados (sem limite) para contar o número total de registros
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRegistros = count($resultados);

// Adiciona a cláusula LIMIT após contar o total de registros
$busca .= " LIMIT :offset, :registrosPorPagina";
$query = $dbh->prepare($busca);

if (isset($data)) {
    $query->bindValue(':data', "%$data%", PDO::PARAM_STR);
}

$query->bindValue(':id_Empresa', $id_Empresa, PDO::PARAM_INT);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':registrosPorPagina', $registrosPorPagina, PDO::PARAM_INT);
$query->execute();

$id_Empresa = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/candidatos.css">
    <title>Candidatos</title>
</head>

<body>
    <header>
        <h1>Candidatos</h1>
    </header>
    <div class="conteiner">
        <div class="filtro">
            <form action="candidatos.php" method="get">
                <input type="search" name="pesquisar" id="pesquisar" placeholder="Nome">
                <button type="submit"><img src="../../img/pesquisa.png" alt=""></button>
                <select name="" id="">
                    <option value="">Local</option>
                </select>
                <select name="" id="">
                    <option value="">Cargo</option>
                </select>
            </form>
        </div>
        <div class="candidatos">
            <?php
            foreach ($id_Empresa as $empresa) {
                echo '<div class="vagas">';
                echo '<h1>' . $empresa['nome'] . '</h1>';
                echo '<h2>' . $empresa['localVaga'] . '</h2>';
                echo '<h3>' . $empresa['cargo'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Adiciona links de paginação -->
        <div class="pagination">
            <?php
            // Calcula o número total de páginas
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
            }
            ?>
        </div>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'http://localhost/TCC/login_empresa/loginPhp/candidatos.php?pesquisar=' + search.value;
    }
</script>
</html>
