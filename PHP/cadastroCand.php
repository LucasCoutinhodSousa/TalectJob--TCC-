<?php
include('conexao.php')

try{
    if(isset($_GET['nome'], $_GET['email'], $_GET['cpf'], $_GET['senha'], $_GET['telefone'], $_GET['sexo'], $_GET['cep'], $_GET['municipio'], $_GET['pais'], $_GET['bairro'], $_GET['estado'], $_GET['estado'], $_GET['rua'], $_GET['empresa'], $_GET['profInicio'], $_GET['cargo'], $_GET['profFinal'], $_GET['profDescricao'], $_GET['formacao'], $_GET['instituicao'], $_GET['status'], $_GET['acadInicio'], $_GET['curso'], $_GET['acadFinal'], $_GET['acadDescricao'])){
        $nome = $_GET['nome'];
        $email = $_GET['email'];
    }
}
?>