<?php

require_once 'models/Produto.php';
require_once 'models/DAO/ProdutoDAO.php';

class ProdutoController {
    private $produtoDAO;

    public function __construct() {
        $this->produtoDAO = new ProdutoDAO();
    }

    public function index() {
        $produtos = $this->produtoDAO->mostrar_tudo();
        require_once 'views/produtos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/produtos/novo.php';
    }

    public function store() {
        $produto = new Produto();
        $produto->nome = $_POST['nome'];
        $produto->preco = $_POST['preco'];
        $produto->descricao = $_POST['descricao'];

        $this->produtoDAO->inserir($produto);
        header("Location: index.php?classe=ProdutoController&metodo=index");
        exit;
    }

    public function edit() {
        $id = $_GET['id'];
        $produto = $this->produtoDAO->buscar_por_id($id);
        require_once 'views/produtos/editar.php';
    }

    public function update() {
        $produto = new Produto();
        $produto->id = $_POST['id'];
        $produto->nome = $_POST['nome'];
        $produto->preco = $_POST['preco'];
        $produto->descricao = $_POST['descricao'];

        $this->produtoDAO->atualizar($produto);
        header("Location: index.php?classe=ProdutoController&metodo=index");
        exit;
    }

    public function delete() {
        $id = $_GET['id'];
        $this->produtoDAO->excluir($id);
        header("Location: index.php?classe=ProdutoController&metodo=index");
        exit;
    }
}
