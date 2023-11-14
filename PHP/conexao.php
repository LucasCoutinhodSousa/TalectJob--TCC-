<?php
    $dsn = 'mysql:dbname=tcc;host=127.0.0.1;port=3308';
    $user = 'root';
    $password = '';

    try{
        $dbh = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        throw new MyDatabaseException($Exception->getMassage(), (int)$Exception->getCode());
    }
?>