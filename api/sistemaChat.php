<?php

namespace Api\Websocket;

use Ratchet\Websocket\MessageComposerInterface;

class sistemaChat implements MessageComposerInterface{
    protected $cliente;

    public function _construct()
    {   
        //Iniciar o objetos que  deve amazenar os clientes conectados
        $this->cliente = new  \SplObjectStorenge;
    }

    
}