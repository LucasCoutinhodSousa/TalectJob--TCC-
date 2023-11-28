<?php
session_start();
ob_start();
include_once ('../PHP/conexao.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
   
    <?php
    //Exemplo criptografar senha
  //  echo password_hash($password, PASSWORD_DEFAULT);
    ?>


    <h1>Login</h1>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         
        if(!empty($dados['SendLogin'])){
           // var_dump($dados);
           $query_usuario = "SELECT id, nome, usuario, senha 
           FROM loginCandidato
           WHERE usuario = :usuario 
           LIMIT 1";

           $result_usuario = $dbh->prepare($query_usuario);
           $result_usuario-> bindParam(':usuario', $dados['usuario'], PDO:: PARAM_STR);
           $result_usuario->execute();
            
           if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC); 
           // var_dump($row_usuario);
            
           if(password_verify($dados['senha'], $row_usuario['senha'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                header("Location: PHP/principalcandidato.php");
            
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro:Senha inválida!</p>";
            }

           }else{
            $_SESSION['msg'] = "Erro: usuário ou senha inválida";

           }

        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        
        }


    ?>


    <form method="POST">
       
        <label>Email</label>
        <input type="text" name="usuario" placeholder="Digite o email"> <br><br>
        
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Digite a senha"> <br><br>

        <input type="submit" value="login" name="SendLogin">

    </form>
    

</body>
</html>