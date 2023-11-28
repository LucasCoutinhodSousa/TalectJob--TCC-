<?php

    include('conexao.php');
    $idvaga = $_GET['id'];

    $query = $dbh->prepare('SELECT cargo, localVaga, descricaoVaga FROM cadasVagas WHERE id=:ididvaga');

    //SELECT id FROM cadasVagas WHERE id=:id'
    $query->execute();

    $vaga = $qury->fetchAll();

    echo $vaga;
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/vaga.css">
    <title>Vaga</title>
</head>
<body>
    <div class="vagas-t">
        <div class="vagas-t">
            <h1>Analista de Sistema</h1>
            <h2>São Paulo</h2>
            <p>Domínio de configurações, recomendações e boas práticas de segurança para sistemas em nuvem; Experiência com tecnologia
            Cloud (IaaS, PaaS, DBaaS, SaaS); Conhecimento avançado nos sistemas operacionais Windows e Linux; Domínio de requisitos
            não funcionais (ex: desempenho, disponibilidade, segurança, interoperabilidade);
            </p>
        </div>
    </div>
</body>
</html>