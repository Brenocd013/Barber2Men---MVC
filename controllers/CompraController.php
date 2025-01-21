<?php

require_once 'models/Compra.php';

class CompraController {
    public function index() {
        $compras = Compra::mostrarTodos();
        require_once 'views/compras/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/compras/novo.php';
    }

    public function store($dados) {
        Compra::inserir($dados);
        header("Location: index.php?classe=CompraController&metodo=index");
    }

    public function edit($id) {
        $compra = Compra::mostrarRegistro($id);
        require_once 'views/compras/editar.php';
    }

    public function update($dados) {
        Compra::atualizar($dados);
        header("Location: index.php?classe=CompraController&metodo=index");
    }

    public function delete($id) {
        Compra::deletar($id);
        header("Location: index.php?classe=CompraController&metodo=index");
    }
}
