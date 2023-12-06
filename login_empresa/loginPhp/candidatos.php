<?php
    include('conexao.php');

    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: telaLoginEmpresa.php');
        exit;
    }

    $id_Empresa = $_SESSION['id'];

    echo $id_Empresa;

    $query = $dbh->prepare('SELECT * FROM vw_visualizarEmp WHERE id=:id_Empresa');
    $query->execute(array(
        'id_Empresa' => $id_Empresa
    ));

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
            <form action="">
                <input type="search" name="" id="" placeholder="Nome">
                <select name="" id="">
                    <option value="">Local</option>
                </select>
                <select name="" id="">
                    <option value="">cargo</option>
                </select>
            </form>
        </div>
        <div class="candidatos">
            <?php
                foreach($id_Empresa as $id_Empresa){
                    echo '<div class="vagas">';
                    echo '<h1>'.$id_Empresa['nome'].'</h1>';
                    echo '<h2>'.$id_Empresa['localVaga'].'</h2>';
                    echo '<h3>'.$id_Empresa['cargo'].'</h3>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>