<?php

    include('conexao.php');
    $idvaga = $_GET['id'];

    session_start(); // Start the session

    // Verifica se o usuário está logado
    if (!isset($_SESSION['id'])) {
        // Se não estiver logado, redirecione para a tela de login
        header('Location: tela_login.php');
        exit;
    }
    
    // Agora você pode acessar o ID do usuário
    $id_do_usuario = $_SESSION['id'];

    $query = $dbh->prepare('select * from vw_cadasEmpre WHERE id=:ididvaga');

    //SELECT id FROM cadasVagas WHERE id=:id'
    $query->execute(array(
        ':ididvaga' => $idvaga
    ));

    $vaga = $query->fetchAll();

    foreach($vaga as $emp){
        $idEmpre = $emp['empresaCada'];
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Formulário foi enviado, executa a query
        $query = $dbh->prepare('INSERT INTO candidatosVagas (candCada, cadasVaga, cadEmpr) VALUES (:id_do_usuario, :idvaga, :idEmpre)');
        $query->execute(array(
            ':id_do_usuario' => $id_do_usuario,
            ':idvaga' => $idvaga,
            ':idEmpre' => $idEmpre
        ));
        echo 'sucesso';
    }
    
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

    <div class="vagas">
        <?php
        foreach($vaga as $vaga){
            echo '<div class="vagas">';
            echo '<h1>'.$vaga['nomeFant'].'</h1>';
            echo '<h3>Cargo: '.$vaga['cargo'].'</h3>';
            echo '<h3>Local: '.$vaga['localVaga'].'</h3>';
            echo '<h3>Descrição: </h3><p>'.$vaga['descricaoVaga'].'</p>';
            echo '<form class="" action="" method="post">
            <input type="submit" value="Candidatar">
             </form>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>