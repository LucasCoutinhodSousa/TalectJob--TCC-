<?php
    if (isset($_GET['falha'])){
        echo "<script>alert('Usuário e/ou senha invalidos')</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
   
      <h1>Recuperar Senha</h1>

      <form method="POST" action="">
        <label>E-mail</label>
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario'];}?>"> <br><br> 



        

      </form>

    
                
                
                
</body>
</html>