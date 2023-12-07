<?php
include('conexao.php');

if (isset($_FILES['perfil_Emp'])) {
    $arquivo = $_FILES['perfil_Emp'];
    if ($arquivo['size'] > 5242880)
        die("Arquivo muito grande");

    $pasta = '../../fotoPerfil/';
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extesao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extesao != "jpg" && $extesao != "png")
        die("Tipo do arquivo não permitido");

    $path =  $pasta . $novoNomeDoArquivo . "." . $extesao;

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
}

try {
    if (
        isset($_POST['cnpj'], $_POST['razao_social'], $_POST['nome_Fant'], $_POST['email'], $_POST['inscricao_Est'], $_POST['senha'], $_POST['cep'], $_POST['municipio'], $_POST['pais'], $_POST['bairro'], $_POST['estado'], $_POST['rua'])
    ) {
        $cnpj = $_POST['cnpj'];
        $razao_social = $_POST['razao_social'];
        $nome_Fant = $_POST['nome_Fant'];
        $email = $_POST['email'];
        $inscricao_Est = $_POST['inscricao_Est'];
        $senha = $_POST['senha'];
        $cep = $_POST['cep'];
        $municipio = $_POST['municipio'];
        $pais = $_POST['pais'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $rua = $_POST['rua'];
    } else {
        echo 'Não definidas';
        die();
    }
} catch (PDOException $e) {
    // Tratar exceções, se necessário
}

$query = $dbh->prepare('INSERT INTO cadasEmpre (cnpj, razaoSoc, nomeFant, email, estadualIns, senha, cep, municipio, pais, bairro, estado, rua, path) 
    VALUES (:cnpj, :razao_social, :nome_Fant, :email, :inscricao_Est, :senha, :cep, :municipio, :pais, :bairro, :estado, :rua, :path)');

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
    ':rua' => $rua,
    ':path' => $path
));

if ($query->rowCount() > 0) {
    echo 'Cadastro realizado com sucesso.';
    header('Location: http://localhost/TCC/login_empresa/loginPhp/telaLoginEmpresa.php');
    echo 'Inseridas com sucesso';
} else {
    echo 'Erro ao cadastrar. Verifique os dados fornecidos.';
}
?>
