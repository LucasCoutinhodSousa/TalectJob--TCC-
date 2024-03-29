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
    <title>telaLoginEmpresa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="../cssLoginEmpresa/telaLoginEmpresa.css">
</head>
<body>
    <main id="container">
        <form id="login_form" method="POST" action="../loginPhp/validarLoginEmpresa.php">
            <div id="form_header">
                <h1>Login</h1>
                
                
                
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>
            <div id="social_media">
                <a href="">
                    <img src="../../img/facebook.jpg" alt="facebook">
                </a>
                <a href="">
                    <img src="../../img/gmail.jpg" alt="gmail">
                </a>
                <a href="">
                    <img src="../../img/linkedin.jpeg" alt="instagram">
                </a>
            </div>
            <div id="inputs">
                <div class="input-box"></div>
                <label for="CNPJ">
                    Cnpj
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="CNPJ" id="CNPJ" name="cnpj" required>
                    </div>
                </label>
            </div>
            <div class="input-box"></div>
            <label for="password">
                Senha
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="senha" name="senha" required>
                </div>
            </label>
            <div id="esqueceu_senha">
                <a href="../htmlLoginEmpresa/telaRedefinirSenhaEmpresa.html">
                    Esqueceu a senha?
                </a>
            </div>
            <div id="cadastro">
                <a href="http://localhost/TCC/HTMl/cadastroEmpresa.html">
                    Cadastre-se
                </a>
            </div>
            </div>
            <button type="submit" id="login_button">
                Login
            </button>
        </form>
    </main>
    <script type="text/javascript" src="../JV/script.js"></script>
</body>
</html>