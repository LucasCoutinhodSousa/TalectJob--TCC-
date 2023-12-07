<?php
    include('conexao.php');

    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: telaLoginEmpresa.php');
        exit;
    }

    $id_Empresa = $_SESSION['id'];

    echo $id_Empresa;

try{
    if(isset($_GET['cargo'], $_GET['local'], $_GET['descrVaga'])){
        $cargo = $_GET['cargo'];
        $local = $_GET['local'];
        $descrVaga = $_GET['descrVaga'];
    }else{
        echo 'Não definidas';
        die();
    }
}catch(PDOException $e){
}

$query = $dbh->prepare('INSERT INTO cadasVagas(cargo, localVaga, descricaoVaga, empresaCada) VALUES(:cargo, :local, :descrVaga, :empresaCada)');

$query->execute(array(
    ':cargo' => $cargo,
    ':local' => $local,
    ':descrVaga' => $descrVaga,
    ':empresaCada' =>$id_Empresa
));

echo 'Cadastrado com sucesso';

?>