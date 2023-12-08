<?php
session_start();

include("conexao.php");

if(!isset($_SESSION['id'])){
    header('Location: telaLoginEmpresa.php');
    exit;
}

$id_Empresa = $_SESSION['id'];

$query = $dbh->prepare('SELECT * FROM cadasEmpre WHERE id=:id_Empresa');

$query->execute(array(
    'id_Empresa' => $id_Empresa
));

$nomeEmpresa = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/perfilRecru.css">
    <title>Perfil Recrutador</title>
</head>
<body>
    <div class="conteiner">
        <div class="perfil">
            <?php
                foreach($nomeEmpresa as $nomeEmpresa){
                    echo '<h2>Nome: '.$nomeEmpresa['nomeFant'].'</h2>';
                    echo '<img src="'.$nomeEmpresa['path'].'">';
                }
            ?>

        </div>
        <div class="acessos">
            <div class="botoes">
                <a href="">Vagas Abertas</a>
            </div>
            <div class="botoes">
                <a href="../loginPhp/adicionaVagas.php">Adicionar Vagas</a>
            </div>
            <div class="botoes">
                <a href="../loginPhp/candidatos.php">Consultar Candidatos</a><br>
            </div>
        </div>
    </div>
</body>
</html>