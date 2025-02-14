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
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $_POST['id'],
                'nome' => $_POST['nome'],
                'preco' => $_POST['preco'],
                'descricao' => $_POST['descricao']
            ];
    
            if (Servico::atualizar($dados)) {
                header("Location: ?classe=ServicoController&metodo=index&msg=Serviço atualizado com sucesso!");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Erro ao atualizar o serviço.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Requisição inválida.</p>";
        }
    }
    public function delete($id) {
        Servico::deletar($id);
        header("Location: index.php?classe=ServicoController&metodo=index");
    }
}
