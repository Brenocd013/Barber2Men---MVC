<?php

class Cliente
{
    public $id;
    public $nome;
    public $cpf;
    public $dt_nasc;
    public $whatsapp;
    public $logradouro;
    public $num;
    public $bairro;

    public function __construct($id = null, $nome = null, $cpf = null, $dt_nasc = null, $whatsapp = null, $logradouro = null, $num = null, $bairro = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dt_nasc = $dt_nasc;
        $this->whatsapp = $whatsapp;
        $this->logradouro = $logradouro;
        $this->num = $num;
        $this->bairro = $bairro;
    }
}