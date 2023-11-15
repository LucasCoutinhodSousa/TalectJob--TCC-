<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['id'])){
        die('Você deve estar logado para acessar essa pagina.
        <a href=".">Entrar</a>
        ');
    }
?>