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
    <title>loginweb</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main id="container">
        <form id="login_form" method="POST" action="./bd/validarLogin.php">
            <div id="form_header">
                <h1>Login</h1>
                
                
                
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>
            <div id="social_media">
                <a href="">
                    <img src="assets/imgs/icons8-facebook-48.png" alt="facebook">
                </a>
                <a href="">
                    <img src="assets/imgs/icons8-google-logo-48.png" alt="facebook">
                </a>
                <a href="">
                    <img src="assets/imgs/icons8-instagram-48.png" alt="facebook">
                </a>
            </div>
            <div id="inputs">
                <div class="input-box"></div>
                <label for="email">
                    Email
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" required>
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
                <a href="redefinirsenha.php">
                    Esqueceu a senha?
                </a>
            </div>
            <div id="cadastro">
                <a href="a">
                    Cadastre-se
                </a>
            </div>
            </div>
            <button type="submit" id="login_button">
                Login
            </button>
        </form>
    </main>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>