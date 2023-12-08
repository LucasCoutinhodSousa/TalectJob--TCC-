<?php
include('conexaobanco.php');

if (isset($_FILES['perfil_f'])) {
    $arquivo = $_FILES['perfil_f'];
    if($arquivo['size'] > 5242880)
        die("Arquivo muito grande");
    
    $pasta = '../../fotoPerfil/';
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extesao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extesao != "jpg" && $extesao != "png")
        die("Tipo do arquivo não permitido");

    $path =  $pasta . $novoNomeDoArquivo . "." . $extesao;

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);


}

try {
    if (
        isset($_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['senha'], $_POST['telefone'], $_POST['sexo'], $_POST['cep'], $_POST['municipio'],
            $_POST['pais'], $_POST['bairro'], $_POST['estado'], $_POST['rua'], $_POST['empresa'], $_POST['profInicio'], $_POST['cargo'], $_POST['profFinal'],
            $_POST['profDescricao'], $_POST['formacao'], $_POST['instituicao'], $_POST['status'], $_POST['acadInicio'], $_POST['curso'], $_POST['acadFim'], $_POST['acadDescricao'])
    ) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $cep = $_POST['cep'];
        $municipio = $_POST['municipio'];
        $pais = $_POST['pais'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $rua = $_POST['rua'];
        $empresa = $_POST['empresa'];
        $profInicio = $_POST['profInicio'];
        $cargo = $_POST['cargo'];
        $profFinal = $_POST['profFinal'];
        $profDescricao = $_POST['profDescricao'];
        $formacao = $_POST['formacao'];
        $instituicao = $_POST['instituicao'];
        $status = $_POST['status'];
        $acadInicio = $_POST['acadInicio'];
        $curso = $_POST['curso'];
        $acadFinal = $_POST['acadFim'];
        $acadDescricao = $_POST['acadDescricao'];
    } else {
        echo 'Nao definidas';
        die();
    }
} catch (PDOException $e) {
    // Tratar exceções, se necessário
}

$query = $dbh->prepare('INSERT INTO cadasCand  (nome, email, cpf, senha, telefone, sexo, cep, municipio, pais, bairro, estado, rua, empresa,
    inicio_profissional, cargo, final_profissional, descricao_profissional, formacao_academica, instituicao_academica, status_academico, inicio_academico, curso_academico, fim_academico, descricao_projetos
    , path) VALUES(:nome, :email, :cpf, :senha, :telefone, :sexo, :cep, :municipio, :pais, :bairro, :estado,
        :rua, :empresa, :profInicio, :cargo, :profFinal, :profDescricao, :formacao, :instituicao,
        :status, :acadInicio, :curso, :acadFinal, :acadDescricao , :path)');

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
    ':acadDescricao' => $acadDescricao,
    ':path' => $path
));

if ($query->rowCount() > 0) {
    echo 'Cadastro realizado com sucesso.';
    header('Location: http://localhost/TCC/loginUsuario/phpLoginUsuario/loginUsuario.php');
    echo 'Inseridas com sucesso';
} else {
    echo 'Erro ao cadastrar. Verifique os dados fornecidos.';
}
?>
