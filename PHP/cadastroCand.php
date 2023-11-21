<?php
include('conexao.php');
    echo '<pre>';
    print_r($_GET);
    echo '<pre>';

try{
    if(isset($_GET['nome'], $_GET['email'], $_GET['cpf'], $_GET['senha'], $_GET['telefone'], $_GET['sexo'], $_GET['cep'], $_GET['municipio'],
     $_GET['pais'], $_GET['bairro'], $_GET['estado'], $_GET['rua'], $_GET['empresa'], $_GET['profInicio'], $_GET['cargo'], $_GET['profFinal'],
      $_GET['profDescricao'], $_GET['formacao'], $_GET['instituicao'], $_GET['status'], $_GET['acadInicio'], $_GET['curso'], $_GET['acadFim'], $_GET['acadDescricao'])){
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $cpf = $_GET['cpf'];
        $senha = $_GET['senha'];
        $telefone = $_GET['telefone'];
        $sexo = $_GET['sexo'];
        $cep = $_GET['cep'];
        $municipio = $_GET['municipio'];
        $pais = $_GET['pais'];
        $bairro = $_GET['bairro'];
        $estado = $_GET['estado'];
        $rua = $_GET['rua'];
        $empresa = $_GET['empresa'];
        $profInicio = $_GET['profInicio'];
        $cargo = $_GET['cargo'];
        $profFinal = $_GET['profFinal'];
        $profDescricao = $_GET['profDescricao'];
        $formacao = $_GET['formacao'];
        $instituicao = $_GET['instituicao'];
        $status = $_GET['status'];
        $acadInicio = $_GET['acadInicio'];
        $curso = $_GET['curso'];
        $acadFinal = $_GET['acadFim'];
        $acadDescricao = $_GET['acadDescricao'];
    }else{
        echo 'Nao definidas';
        die();
    }
}catch(PDOException $e){
    throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
}

$query = $dbh->prepare('INSERT INTO cadasCand  (nome, email, cpf, senha, telefone, sexo, cep, municipio, pais, bairro, estado, rua, empresa,
inicio_profissional, cargo, final_profissional, descricao_profissional, formacao_academica, instituicao_academica, status_academico, inicio_academico, curso_academico, fim_academico, descricao_projetos
) VALUES(:nome, :email, :cpf, :senha, :telefone, :sexo, :cep, :municipio, :pais, :bairro, :estado,
    :rua, :empresa, :profInicio, :cargo, :profFinal, :profDescricao, :formacao, :instituicao,
    :status, :acadInicio, :curso, :acadFinal, :acadDescricao)');

$query->execute(array(
    ':nome' => $nome,
    ':email' => $email,
    ':cpf' => $cpf,
    ':senha' => $senha,
    ':telefone' => $telefone,
    ':sexo' => $sexo,
    ':cep' => $cep,
    ':municipio' => $municipio,
    ':pais' => $pais,
    ':bairro' => $bairro,
    ':estado' => $estado,
    ':rua' => $rua,
    ':empresa' => $empresa,
    ':profInicio' => $profInicio,
    ':cargo' => $cargo,
    ':profFinal' => $profFinal,
    ':profDescricao' => $profDescricao,
    ':formacao' => $formacao,
    ':instituicao' => $instituicao,
    ':status' => $status,
    ':acadInicio' => $acadInicio,
    ':curso' => $curso,
    ':acadFinal' => $acadFinal,
    ':acadDescricao' => $acadDescricao
));

echo 'Inseridas com sucesso';

if ($query->rowCount() > 0) {
    echo 'Cadastro realizado com sucesso.';
    header('Location: ../HTML/perfilRecrutador.html');
} else {
    echo 'Erro ao cadastrar. Verifique os dados fornecidos.';
}
?>