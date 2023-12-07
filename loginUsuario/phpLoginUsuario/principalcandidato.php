<?php
session_start();

include("conexaobanco.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redirecione para a tela de login
    header('Location: tela_login.php');
    exit;
}

// Agora você pode acessar o ID do usuário
$id_do_usuario = $_SESSION['id'];

$query = $dbh->prepare('SELECT * FROM cadasCand WHERE id=:id_do_usuario');

$query->execute(array(
    'id_do_usuario' => $id_do_usuario
));

$nome = $query->fetchAll();


// O restante do conteúdo da sua tela logada
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>principalcandidato</title>
    <link rel="stylesheet" href="../cssLoginUsuario/principalcandidato.css">
</head>
<body>
    <div class="container">


        <div class="conteudo1">

            <?php
                foreach($nome as $nome){
                    echo '<h1>'.$nome['nome'].'</h1>';
                    echo '<img height="50" src="'.$nome['path'].'">';
                }
            ?>
            
            <button class="perfil" type="submit" id="Perfil">Perfil</button>
            <button type="submit" id="PortalVagas"><a href="../../PHP/portalDVagas.php">Portal de vagas</a></button>
            <button type="submit" id="Candidaturas"><a href="../../PHP/candidaturas.php">Candidaturas</a></button>

        </div>

        <div class="conteudo2">

            <h1> Pesquisar empresa</h1>

            <div id="divBusca">
                 
                 <input type="text" id="txtBusca" placeholder="Buscar..."/>
                 <button id="btnBusca">Buscar</button>
            </div>

        </div>

    </div>

    
</body>
</html>
