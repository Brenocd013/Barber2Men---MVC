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

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $_POST['id'],
                'nome' => $_POST['nome'],
                'preco' => $_POST['preco'],
                'descricao' => $_POST['descricao']
            ];
    
            if (Produto::atualizar($dados)) {
                header("Location: ?classe=ProdutoController&metodo=index&msg=Produto atualizado com sucesso!");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Erro ao atualizar o produto.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Requisição inválida.</p>";
        }
    }
    
    public function delete($id) {
        Produto::deletar($id);
        header("Location: index.php?classe=ProdutoController&metodo=index");
    }
}
