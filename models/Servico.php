<?php

class Servico
{
    public $id;
    public $nome;
    public $preco;
    public $descricao;

    public function __construct($id = null, $nome = null, $preco = null, $descricao = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }
}
