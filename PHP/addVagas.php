<?php
    include('conexao.php');

try{
    if(isset($_GET['cargo'], $_GET['localVaga'], $_GET['descrVaga'])){
        $cargo = $_GET['cargo'];
        $local = $_GET['local'];
        $descrVaga = $_GET['descrVaga'];
    }else{
        echo 'Não definidas';
        die();
    }
}catch(PDOException $e){
}

$query = $dbh->prepare('INSERT INTO cadasVagas(cargo, localVaga, descricao) VALUES(:cargo, :local, :descrVaga)');

$query->execute(array(
    ':cargo' => $cargo,
    ':local' => $local,
    ':descrVaga' => $descrVaga
));

echo 'Cadastrado com sucesso';

?>