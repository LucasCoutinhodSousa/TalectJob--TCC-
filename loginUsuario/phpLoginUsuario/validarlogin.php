<?php

    //Inclusão da conexão
    include("conexao.php");

    //Criando variaveis para realização da consulta ao banco de dados
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    //Verificando se o usuário digitou os campos obrigatórios
    echo empty($login);
    if (empty($login) || empty($senha)){
        // Utilizando alerta em JavaScrip para exibição de mensagem
        echo "<script>alert('Campos obrigatório vazios')</script>";
    }else{
        //Tentando realizar consulta, o try é importante pois o erro não exibido por padrão ao usuário
        try{
            // Preparando instrução para a consulta do banco de dados
            $query = $dbh->prepare("SELECT id,email,senha FROM logincandidato WHERE email=:email AND senha=:senha;");
            $query->execute(array(
                ':email' => $login,
                ':senha' => $senha
            )
        );
        //Obtendo através do fetch uma única linha de resultado do banco
        $resultado = $query->fetch();
        //print_r($resultado);
        if(empty($resultado)){
            header('Location: ../?falha');
        }
        else{
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['nome'] = $resultado['nome'];
            header('Location: ../principalcandidato.php');
        }

        }catch(Exception $e){
            echo $e;
        }
    }
?>