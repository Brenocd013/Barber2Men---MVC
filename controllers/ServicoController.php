<?php

require_once 'models/Servico.php';

class ServicoController {
    public function index() {
        $servicos = Servico::mostrarTodos();
        require_once 'views/servicos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/servicos/novo.php';
    }

    public function store($dados) {
        Servico::inserir($dados);
        header("Location: index.php?classe=ServicoController&metodo=index");
    }

    public function edit($id) {
        $servico = Servico::mostrarRegistro($id);
        require_once 'views/servicos/editar.php';
    }

    public function update($dados) {
        // Adiciona o ID do serviço ao array de dados
        $dados['id'] = $_GET['id'];
    
        // Chama o método de atualização no modelo
        Servico::atualizar($dados);
        header("Location: index.php?classe=ServicoController&metodo=index");
    }
    
    public function delete($id) {
        Servico::deletar($id);
        header("Location: index.php?classe=ServicoController&metodo=index");
    }
}
