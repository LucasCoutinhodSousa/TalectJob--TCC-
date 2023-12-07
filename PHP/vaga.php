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

<h1><?php echo $id_do_usuario?></h1>
    <div class="vagas">
        <?php
        foreach($vaga as $vaga){
            echo '<div class="vagas">';
            echo '<h3>'.$vaga['nomeFant'].'</h3>';
            echo '<h1>'.$vaga['cargo'].'</h1>';
            echo '<h2>'.$vaga['localVaga'].'</h2';
            echo '<h1>'.$vaga['descricaoVaga'].'</h1>';
            echo '</div>';
        }
        ?>
        <form action="" method="post">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>