<?php

require_once 'models/Produto.php';

class ProdutoController {
    public function index() {
        $produtos = Produto::mostrarTodos();
        require_once 'views/produtos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/produtos/novo.php';
    }

    public function store($dados) {
        Produto::inserir($dados);
        header("Location: index.php?classe=ProdutoController&metodo=index");
    }

    public function edit($id) {
        $produto = Produto::mostrarRegistro($id);
        require_once 'views/produtos/editar.php';
    }

    public function update($dados) {
        $dados['id'] = $_GET['id']; 

        Produto::atualizar($dados);
        header("Location: index.php?classe=ProdutoController&metodo=index");
    }

    public function delete($id) {
        Produto::deletar($id);
        header("Location: index.php?classe=ProdutoController&metodo=index");
    }
}
