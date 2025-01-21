<?php

require_once 'models/Agendamento.php';

class AgendamentoController {
    public function index() {
        $agendamentos = Agendamento::mostrarTodos();
        require_once 'views/agendamentos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/agendamentos/novo.php';
    }

    public function store($dados) {
        Agendamento::inserir($dados);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
    }

    public function edit($id) {
        $agendamento = Agendamento::mostrarRegistro($id);
        require_once 'views/agendamentos/editar.php';
    }

    public function update($dados) {

        $dados['id'] = $_GET['id'];
        Agendamento::atualizar($dados);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
    }

    public function delete($id) {
        Agendamento::deletar($id);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
    }
}
