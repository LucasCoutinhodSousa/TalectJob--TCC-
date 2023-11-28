<?php
session_start();
ob_start();
include_once 'conexao.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
</head>
<body>
        
        <h1>Recuperar Senha</h1>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        

       if(!empty($dados['SendRecup'])){
            var_dump($dados);

            $query_usuario = "SELECT id, nome, usuario, FROM loginCandidato WHERE usuario=:usuario LIMIT 1";
            $result_usuario = $dbh ->prepare($query_usuario);
            $result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
            $result_usuario -> execute();

            if(($result_usuario) AND ($result_usuario->rowCount() !=0)){

            }else{
             $_SESSION ['msg'] = "<p style='color: #ff0000' >Erro: Usuario não encontrado!";
            
            }
        }

            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);    
            }



        ?>

    <form method="POST" action="">
            <label>Email</label>
            <input type="text" name="usuario" placeholder="Digite o email" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'];}?>"><br><br>

            <input type="submit" value="Recuperar" name="SendRecuperar">


    </form>



</body>
</html>