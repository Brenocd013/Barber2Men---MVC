<?php

require_once 'models/Cliente.php';

class ClienteController {
    public function index() {
        $clientes = Cliente::mostrarTodos();
        require_once 'views/clientes/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/clientes/novo.php';
    }

    public function store($dados) {
        Cliente::inserir($dados);
        header("Location: index.php?classe=ClienteController&metodo=index");
    }

    public function edit($id) {
        $cliente = Cliente::mostrarRegistro($id);
        require_once 'views/clientes/editar.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $_POST['id'],
                'nome' => $_POST['nome'],
                'cpf' => $_POST['cpf'],
                'whatsapp' => $_POST['whatsapp']
            ];
    
            if (Cliente::atualizar($dados)) {
                header("Location: ?classe=ClienteController&metodo=index&msg=Cliente atualizado com sucesso!");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Erro ao atualizar o cliente.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Requisição inválida.</p>";
        }
    }
    
    

    public function delete($id) {
        Cliente::deletar($id);
        header("Location: index.php?classe=ClienteController&metodo=index");
    }
}
