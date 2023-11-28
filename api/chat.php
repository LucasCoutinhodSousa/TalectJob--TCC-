<?php

session_start(); // Iniciar a sessão

ob_start(); // Limpar o buffer de saida para evitar erro de redirecionamento
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>

<body>
    <h2>Chat</h2>
    <span id="mensagem-chat"></span>

    <script>
        const mensagemChat = document.getElementById('mensagem-chat');

        // Endereço do websocket
        const ws = new WebSocket('ws://localhost:8080');

        // Realizar a conexão com websocket
        ws.onopen = (e) => {
            console.log('Conectado!');
        }
    </script>

</body>
</html>