<?php
    include('conexao.php');
    try{
        if(isset($_GET['cnpj'], $_GET['razao_social'], $_GET['nome_Fant'], $_GET['email'], $_GET['inscricao_Est'], $_GET['senha'], $_GET['cep'], $_GET['municipio'], $_GET['pais'], $_GET['bairro'], $_GET['estado', $_GET['rua']])){
            $cnpj = $_GET['cnpj'];
            $razao_social = $_GET['razao_social'];
            $nome_Fant = $_GET['nome_Fant'];
            $email = $_GET['email'];
            $inscricao_Est = $_GET['inscricao_Est'];
            $senha = $_GET['semha'];
            $cep = $_GET['cep'];
            $municipio = $_GET['municipio'];
            $_GET = $_GET['pais'];
        }else{
            echo 'Não definidas';
            die();
        }
    }catch(PDOException $e){
        throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
    }

    $query = $dbh->prepare('INSERT INTO cadasVagas (cnpj, razaoSoc, nomeFant, email, estadualIns, senha) 
    VALUES(:cnpj, :razao_social, :nome_Fant, :email, :inscricao_Est, :senha)');

    $query->prepare(array(
        ':cnpj' => $cnpj,
        ':razao_social' => $razao_social,
        'nome_Fant' => $nome_Fant,
        ':email' => $email,
        ':inscricao_Est' => $inscricao_Est,
        ':senha' => $senha
    ));

    if ($query->rowCount() > 0) {
        echo 'Cadastro realizado com sucesso.';
        header('Location: ../HTML/perfilRecrutador.html');
        echo 'Inseridas com sucesso';
    } else {
        echo 'Erro ao cadastrar. Verifique os dados fornecidos.';
    }

?>