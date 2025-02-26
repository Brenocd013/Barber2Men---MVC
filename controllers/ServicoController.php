<?php

require_once 'models/Servico.php';
require_once 'models/DAO/ServicoDAO.php';

class ServicoController {
    private $servicoDAO;

    public function __construct() {
        $this->servicoDAO = new ServicoDAO();
    }

    public function index() {
        $servicos = $this->servicoDAO->mostrar_tudo();
        require_once 'views/servicos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/servicos/novo.php';
    }

    public function store() {
        $servico = new Servico();
        $servico->nome = $_POST['nome'];
        $servico->preco = $_POST['preco'];
        $servico->descricao = $_POST['descricao'];

        $this->servicoDAO->inserir($servico);
        header("Location: index.php?classe=ServicoController&metodo=index");
        exit;
    }

    public function edit() {
        $id = $_GET['id'];
        $servico = $this->servicoDAO->buscar_por_id($id);
        require_once 'views/servicos/editar.php';
    }

    public function update() {
        $servico = new Servico();
        $servico->id = $_POST['id'];
        $servico->nome = $_POST['nome'];
        $servico->preco = $_POST['preco'];
        $servico->descricao = $_POST['descricao'];

        $this->servicoDAO->atualizar($servico);
        header("Location: index.php?classe=ServicoController&metodo=index");
        exit;
    }

    public function delete() {
        $id = $_GET['id'];
        $this->servicoDAO->excluir($id);
        header("Location: index.php?classe=ServicoController&metodo=index");
        exit;
    }
}
