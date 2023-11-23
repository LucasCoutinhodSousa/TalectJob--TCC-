<?php
    include('conexao.php');
    try{
        if(isset($_GET['cnpj'], $_GET['razao_social'], $_GET['nome_Fant'], $_GET['email'], $_GET['inscricao_Est'], $_GET['senha'], $_GET['cep'], $_GET['municipio'], $_GET['pais'], $_GET['bairro'], $_GET['estado'], $_GET['rua'])){
            $cnpj = $_GET['cnpj'];
            $razao_social = $_GET['razao_social'];
            $nome_Fant = $_GET['nome_Fant'];
            $email = $_GET['email'];
            $inscricao_Est = $_GET['inscricao_Est'];
            $senha = $_GET['senha'];
            $cep = $_GET['cep'];
            $municipio = $_GET['municipio'];
            $pais = $_GET['pais'];
            $bairro = $_GET['bairro'];
            $estado = $_GET['estado'];
            $rua = $_GET['rua'];

        }else{
            echo 'Não definidas';
            die();
        }
    }catch(PDOException $e){
        throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
    }

    $query = $dbh->prepare('INSERT INTO cadasEmpre (cnpj, razaoSoc, nomeFant, email, estadualIns, senha, cep, municipio, pais, bairro, estado, rua) 
    VALUES (:cnpj, :razao_social, :nome_Fant, :email, :inscricao_Est, :senha, :cep, :municipio, :pais, :bairro, :estado, :rua)');

$query->execute(array(
        ':cnpj' => $cnpj,
        ':razao_social' => $razao_social,
        'nome_Fant' => $nome_Fant,
        ':email' => $email,
        ':inscricao_Est' => $inscricao_Est,
        ':senha' => $senha,
        ':cep' => $cep,
        ':municipio' => $municipio,
        ':pais' => $pais,
        ':bairro' => $bairro,
        ':estado' => $estado,
        ':rua' => $rua
));

    if ($query->rowCount() > 0) {
        echo 'Cadastro realizado com sucesso.';
        header('Location: ../HTML/perfilRecrutador.html');
        echo 'Inseridas com sucesso';
    } else {
        echo 'Erro ao cadastrar. Verifique os dados fornecidos.';
    }

?>