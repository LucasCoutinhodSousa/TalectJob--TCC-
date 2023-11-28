<?php

    include('conexao.php');
    $idvaga = $_GET['id'];

    $query = $dbh->prepare('SELECT cargo, localVaga, descricaoVaga FROM cadasVagas WHERE id=:ididvaga');

    //SELECT id FROM cadasVagas WHERE id=:id'
    $query->execute(array(
        ':ididvaga' => $idvaga
    ));

    $vaga = $query->fetchAll();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/vaga.css">
    <title>Vaga</title>
</head>
<body>
    <div class="vagas-t">
        <div class="vagas-t"><?php
        foreach($vaga as $vaga){
            echo '<h1>'.$vaga['cargo'].'</h1>';
            echo '<h2>'.$vaga['localVaga'].'</h2';
            echo '<p>'.$vaga['descricaoVaga'].'</p>';
        }
        ?>
        </div>
    </div>
</body>
</html>