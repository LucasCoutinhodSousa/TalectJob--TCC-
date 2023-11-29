<?php
session_start();
ob_start();
include ('conexaobanco.php');

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
        

       if(!empty($dados['SendRecuperar'])){
            var_dump($dados);

            $query_usuario = "SELECT id, nome, usuario FROM loginCandidato WHERE usuario=:usuario LIMIT 1";
            $result_usuario = $dbh ->prepare($query_usuario);
            $result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
            $result_usuario -> execute();

            if(($result_usuario) AND ($result_usuario->rowCount() !=0)){
                $row_usuario = $result_usuario -> fetch(PDO::FETCH_ASSOC);
                $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
              //  echo "chave $chave_recuperar_senha <br>";
                $query_up_usuario = "UPDATE loginCandidato SET recuperar_senha =:recuperar_senha WHERE id=:id LIMIT 1";
                $result_up_usuario = $dbh -> prepare($query_up_usuario);
                $result_up_usuario -> bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
                $result_up_usuario -> bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                if($result_up_usuario ->execute()){
                    echo "http://localhost/TCC/loginUsuario/phpLoginUsuario/atualizar_senha.php?chave=$chave_recuperar_senha";

                }else{
                    $_SESSION ['msg'] = "<p style='color: #ff0000' >Erro: Tente novamente";
                }



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