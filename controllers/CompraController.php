<?php

require_once 'models/Compra.php';
require_once 'models/DAO/CompraDAO.php';

class CompraController {
    private $compraDAO;

    public function __construct() {
        $this->compraDAO = new CompraDAO();
    }

    public function index() {
        $compras = $this->compraDAO->mostrar_tudo();
        require_once 'views/compras/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/compras/novo.php';
    }

    public function store() {
        $compra = new Compra();
        $compra->cliente_id = $_POST['cliente_id'];
        $compra->produto_id = $_POST['produto_id'];
        $compra->quantidade = $_POST['quantidade'];
        $compra->data = $_POST['data'];

        $this->compraDAO->inserir($compra);
        header("Location: index.php?classe=CompraController&metodo=index");
        exit;
    }

    public function edit() {
        $id = $_GET['id'];
        $compra = $this->compraDAO->buscar_por_id($id);
        require_once 'views/compras/editar.php';
    }

    public function update() {
        $compra = new Compra();
        $compra->id = $_POST['id'];
        $compra->cliente_id = $_POST['cliente_id'];
        $compra->produto_id = $_POST['produto_id'];
        $compra->quantidade = $_POST['quantidade'];
        $compra->data = $_POST['data'];

        $this->compraDAO->atualizar($compra);
        header("Location: index.php?classe=CompraController&metodo=index");
        exit;
    }

    public function delete() {
        $id = $_GET['id'];
        $this->compraDAO->excluir($id);
        header("Location: index.php?classe=CompraController&metodo=index");
        exit;
    }
}
