<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: telaLoginEmpresa.php');
    exit;
}

$id_Empresa = $_SESSION['id'];

    $id_Empresa = $_SESSION['id'];
    $busca = "SELECT * FROM vw_visualizarEmp WHERE id=:id_Empresa";

    if(!empty($_GET['pesquisar']))
    {
        $data = $_GET['pesquisar'];
        $busca .= " OR nome LIKE :data";
    }

    $query = $dbh->prepare($busca);

    if(!empty($data)) {
        $query->bindValue(':data', "%$data%", PDO::PARAM_STR);
    }

    $query->bindValue(':id_Empresa', $id_Empresa, PDO::PARAM_INT);

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
                foreach($id_Empresa as $empresa){
                    echo '<div class="vagas">';
                    echo '<h1>'.$empresa['nome'].'</h1>';
                    echo '<h2>'.$empresa['localVaga'].'</h2>';
                    echo '<h3>'.$empresa['cargo'].'</h3>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'http://localhost/TCC/login_empresa/loginPhp/candidatos.php?pesquisar='+search.value;
    }
</script>
</html>
