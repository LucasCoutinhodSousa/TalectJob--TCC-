<?php
    include('conexao.php');

    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: telaLoginEmpresa.php');
        exit;
    }

    $id_Empresa = $_SESSION['id'];

?>

<html>
    <head lang="pt-BR">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../CSS/estilo.css">
        <link rel="stylesheet" href="../../CSS/adicionarVagas.css">
        <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.css">
        <title>Login</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="http://"><img src="../IMG/logo.png" alt=""></a>
            </div>
            <div class="espacamento">

            </div>
            <div class="menu">
                <ul>
                    <li><a href="">Relatorios</a>
                    </li>
                </ul>
                <a href="http://"><img src="../IMG/logo.png" alt=""></a>
            </div>
        </header>
        <div class="conteudo-cadastro">
            <article>
                <div class="area-cadastro">
                    <form action="../../PHP/addVagas.php" method="get">    
                        <div class="input-group">

                            <h1>Adicionar Vagas</h1>
                            <div class="input-group">
                                <div class="input-box">
                                    <label for="Cargo">Cargo</label>
                                    <input id="Cargo" type="text" name="cargo" required placeholder="Cargo">
                                </div>


                                <div class="input-box">
                                    <label for="Locacl">Local</label>
                                    <input id="Local" type="text" name="local" required placeholder="Local">
                                </div>

                                <div class="input-box">
                                    <label for="">Descrição da Vaga</label>
                                    <div class="textGra">
                                        <textarea name="descrVaga" id="descricao" cols="30" rows="10" placeholder="Descrição da Vaga"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="button">
                                    <input type="submit" value="Adicionar">
                                </div>
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </body>