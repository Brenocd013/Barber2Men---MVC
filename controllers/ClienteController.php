<?php

require_once 'models/Cliente.php';
require_once 'models/DAO/ClienteDAO.php';

class ClienteController {
    private $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function index() {
        $clientes = $this->clienteDAO->mostrar_tudo();
        require_once 'views/clientes/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/clientes/novo.php';
    }

    public function store() {
        $cliente = new Cliente();
        $cliente->nome = $_POST['nome'];
        $cliente->cpf = $_POST['cpf'];
        $cliente->dt_nasc = $_POST['dt_nasc'];
        $cliente->whatsapp = $_POST['whatsapp'];
        $cliente->logradouro = $_POST['logradouro'];
        $cliente->num = $_POST['num'];
        $cliente->bairro = $_POST['bairro'];

        $this->clienteDAO->inserir($cliente);
        header("Location: index.php?classe=ClienteController&metodo=index");
        exit;
    }

    public function edit() {
        $id = $_GET['id'];
        $cliente = $this->clienteDAO->buscar_por_id($id);
        require_once 'views/clientes/editar.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente();
            $cliente->id = $_POST['id'];
            $cliente->nome = $_POST['nome'];
            $cliente->cpf = $_POST['cpf'];
            $cliente->dt_nasc = $_POST['dt_nasc'];
            $cliente->whatsapp = $_POST['whatsapp'];
            $cliente->logradouro = $_POST['logradouro'];
            $cliente->num = $_POST['num'];
            $cliente->bairro = $_POST['bairro'];
            
            if ($this->clienteDAO->atualizar($cliente)) {
                header("Location: ?classe=ClienteController&metodo=index&msg=Cliente atualizado com sucesso!");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Erro ao atualizar o cliente.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Requisição inválida.</p>";
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->clienteDAO->excluir($id);
        header("Location: index.php?classe=ClienteController&metodo=index");
        exit;
    }
    
    public function search() {
        $nome = $_GET['nome'] ?? '';
        if (!empty($nome)) {
            $clientes = $this->clienteDAO->buscar_por_nome($nome);
        } else {
            $clientes = $this->clienteDAO->mostrar_tudo();
        }
        require_once 'views/clientes/mostrar_tudo.php';
    }
}