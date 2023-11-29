<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=recrutweb;host=127.0.0.1;port=3306';
$user = 'root';
$password = '';


try{
    $dbh = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        echo "Erro de conexão com o Banco de Dados";
        //echo ($e);
    }

?>