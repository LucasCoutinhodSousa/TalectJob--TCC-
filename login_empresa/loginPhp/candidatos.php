<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: telaLoginEmpresa.php');
    exit;
}

$id_Empresa = $_SESSION['id'];

// Consulta para obter o total de resultados
$totalQuery = $dbh->prepare('SELECT COUNT(*) AS total FROM vw_visualizarEmp WHERE id = :id_Empresa');
$totalQuery->execute(array(':id_Empresa' => $id_Empresa));
$totalResult = $totalQuery->fetch();
$totalItens = $totalResult['total'];

// Número de itens por página
$itensPorPagina = 3;

// Página atual
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular o offset
$offset = ($paginaAtual - 1) * $itensPorPagina;

// Consulta com paginação
$query = $dbh->prepare('SELECT * FROM vw_visualizarEmp WHERE id = :id_Empresa LIMIT :offset, :itensPorPagina');
$query->bindValue(':id_Empresa', $id_Empresa, PDO::PARAM_INT);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':itensPorPagina', $itensPorPagina, PDO::PARAM_INT);
$query->execute();
$resultados = $query->fetchAll();

// Calcular o número total de páginas
$totalPaginas = ceil($totalItens / $itensPorPagina);

if(!empty($_GET['search'])){
    
    echo 'contem algo, pesqusar';
}else{
    echo 'não contem nada';
}
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
            <form action="">
                <input type="search" name="" id="pesquisar" placeholder="Nome">
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
            foreach ($resultados as $resultado) {
                echo '<div class="vagas">';
                echo '<h1>' . $resultado['nome'] . '</h1>';
                echo '<h2>' . $resultado['localVaga'] . '</h2>';
                echo '<h3>' . $resultado['cargo'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo '<a href="candidatos.php?pagina=' . $i . '">' . $i . '</a>';
            }
            ?>
        </div>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    }
    );

    function searchData(){
        window.location = 'candicados.php?search'+search.value;
    }
</script>
</html>
