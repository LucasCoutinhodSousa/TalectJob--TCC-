<?php
    include('conexao.php');

    session_start(); // Start the session

    // Verifica se o usuário está logado
    if (!isset($_SESSION['id'])) {
        // Se não estiver logado, redirecione para a tela de login
        header('Location: tela_login.php');
        exit;
    }
       // Agora você pode acessar o ID do usuário
    $id_do_usuario = $_SESSION['id'];

    echo $id_do_usuario;

    $query = $dbh->prepare('SELECT * from vw_visualizaCand WHERE id=:id_do_usuario');

    $query->execute(array(
        ':id_do_usuario' => $id_do_usuario
    ));

    $id_do_usuario = $query->fetchAll();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleInicial.css">
    <link rel="stylesheet" href="../CSS/candidatura.css">
    <title>Candidaturas</title>
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
            </a>
        </div>
    </header>
    <div class="conteiner">
        <div class="vagas-to">
            <div class="links">
                <a href="">Em Andamento</a>
                <a href="" class="linha">Finalizada</a>
            </div>
            <?php
                foreach($id_do_usuario as $id_do_usuario){
                    echo'<div class="vagas">';
                    echo'<h1>'.$id_do_usuario['nomeFant'].'</h1>';
                    echo'<h2>'.$id_do_usuario['cargo'].'</h2>';
                    echo'<h2>'.$id_do_usuario['localVaga'].'</h2>';
                    echo'<p>'.$id_do_usuario['descricaoVaga'].'</p>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>