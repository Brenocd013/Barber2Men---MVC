<?php

class Agendamento
{
    public $id;
    public $cliente_id;
    public $servico_id;
    public $data;
    public $horario;
    public $observacao;

    public function __construct($id = null, $cliente_id = null, $servico_id = null, $data = null, $horario = null, $observacao = null)
    {
        $this->id = $id;
        $this->cliente_id = $cliente_id;
        $this->servico_id = $servico_id;
        $this->data = $data;
        $this->horario = $horario;
        $this->observacao = $observacao;
    }
}
