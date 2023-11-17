<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../CSS/style.css">

    <title>Login Dark/Light Mode</title>
</head>
<body>   
    <main id="container">
        <form id="login_form">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Redefinir a senha</h1>
                
            </div>

          

            <!-- INPUTS -->
            <div id="inputs">
                
                </div>

                <!-- EMAIL -->
                <div class="input-box">
                    <label for="email">
                        E-mail
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email">
                        </div>
                    </label>
                </div>

                <!-- PASSWORD -->
                <div class="input-box">
                    <label for="password">
                        Senha
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="Senha" name="Senha">
                        </div>
                    </label>

                   
                </div>
            </div>

            <!-- LOGIN BUTTON -->
            <button type="submit" id="redefinir_button">
                Redefinir a senha
            </button>
        </form>
    </main>

    
</body>
</html>