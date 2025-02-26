<?php

class Compra
{
    public $id;
    public $cliente_id;
    public $produto_id;
    public $data;
    public $horario;
    public $quantidade;

    public function __construct($id = null, $cliente_id = null, $produto_id = null, $data = null, $horario = null, $quantidade = null)
    {
        $this->id = $id;
        $this->cliente_id = $cliente_id;
        $this->produto_id = $produto_id;
        $this->data = $data;
        $this->horario = $horario;
        $this->quantidade = $quantidade;
    }
}
