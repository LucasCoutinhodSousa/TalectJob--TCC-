<?php
    include('conexao.php');
    $query = $dbh->prepare('SELECT * FROM cadasVagas');
    $query->execute();

    $vagas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleInicial.css">
    <link rel="stylesheet" href="../CSS/portalVagas.css">
    <title>Portal de Vagas</title>
</head>
<body>
    <header>
        <a href=""><img src="" alt="">Logo</a>
        <div class="cabecalho-inicial">
            <a href="portalVagas.html">Portal de Vagas</a>
                <select name="login" id="link" onchange="location = this.value;">
                    <option value="" disabled selected>Login</option>
                    <option value="loginCan.html">Login Cadidato</option>
                    <option value="http://www.youtube.com">Login Empresa</option>
                </select>
            </a>
        </div>
    </header>
    <div class="conteiner">
        <div class="filto-to">
            <div class="filtro">
                <h1>Filtro</h1>
                <select name="" id="" aria-placeholder="Filtro">
                    <option value="">Local</option>
                    <option value="">Local</option>
                    <option value="">Local</option>
                </select>
                <select name="" id="">
                    <option value="">Área profissional</option>
                    <option value="">Área profissional</option>
                    <option value="">Área profissional</option>
                </select>
                <select name="" id="">
                    <option value="">Faixa Salarial</option>
                    <option value="">Faixa Salarial</option>
                    <option value="">Faixa Salarial</option>
                </select>
            </div>
        </div>
        <div class="vagas-to">

        <?php
        foreach($vagas as $vaga){
            echo '<div class="vagas">';
            echo  '<a href="../HTML/Inicial.html">';
            echo  '<h1>'.$vaga['cargo'].'</h1>';
            echo  '<h2>'.$vaga['localVaga'].'</h2>';
            echo    '<p>'.$vaga['descricaoVaga'].'</p>';
            '</a>';
           echo '</div>';
            }
        ?>
            <!--<div class="vagas">
                <h1>Analista de Sistema</h1>
                <h2>São Paulo</h2>
                <p>Domínio de configurações, recomendações e boas práticas de segurança para sistemas em nuvem; Experiência com tecnologia
                Cloud (IaaS, PaaS, DBaaS, SaaS); Conhecimento avançado nos sistemas operacionais Windows e Linux; Domínio de requisitos
                não funcionais (ex: desempenho, disponibilidade, segurança, interoperabilidade);
                </p>
            </div>

            <div class="vagas">
                <h1>Analista de Sistema</h1>
                <h2>São Paulo</h2>
                <p>Domínio de configurações, recomendações e boas práticas de segurança para sistemas em nuvem; Experiência com tecnologia
                Cloud (IaaS, PaaS, DBaaS, SaaS); Conhecimento avançado nos sistemas operacionais Windows e Linux; Domínio de requisitos
                não funcionais (ex: desempenho, disponibilidade, segurança, interoperabilidade);
                </p>
            </div>-->
        </div>
    </div>
</body>
</html>