<?php

require_once 'models/Agendamento.php';
require_once 'models/DAO/AgendamentoDAO.php';

class AgendamentoController {
    private $agendamentoDAO;

    public function __construct() {
        $this->agendamentoDAO = new AgendamentoDAO();
    }

    public function index() {
        $agendamentos = $this->agendamentoDAO->mostrar_tudo();
        require_once 'views/agendamentos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/agendamentos/novo.php';
    }

    public function store() {
        $agendamento = new Agendamento();
        $agendamento->cliente_id = $_POST['cliente_id'];
        $agendamento->servico_id = $_POST['servico_id'];
        $agendamento->data = $_POST['data'];
        $agendamento->horario = $_POST['hora'];
        $agendamento->observacao = $_POST['observacao'];

        $erro = "";

        // Validações antes de inserir
        if (!$this->agendamentoDAO->verificarClienteExiste($agendamento->cliente_id)) {
            $erro .= "❌ Cliente ID " . htmlspecialchars($agendamento->cliente_id) . " não encontrado.<br>";
        }

        if (!$this->agendamentoDAO->verificarServicoExiste($agendamento->servico_id)) {
            $erro .= "❌ Serviço ID " . htmlspecialchars($agendamento->servico_id) . " não encontrado.<br>";
        }

        if (!empty($erro)) {
            header("Location: ?classe=AgendamentoController&metodo=create&erro=" . urlencode($erro));
            exit;
        }

        if ($this->agendamentoDAO->inserir($agendamento)) {
            header("Location: index.php?classe=AgendamentoController&metodo=index&msg=Agendamento cadastrado com sucesso!");
            exit;
        } else {
            header("Location: ?classe=AgendamentoController&metodo=create&erro=" . urlencode("Erro ao cadastrar agendamento."));
            exit;
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $agendamento = $this->agendamentoDAO->buscar_por_id($id);
        require_once 'views/agendamentos/editar.php';
    }

    public function update() {
        $agendamento = new Agendamento();
        $agendamento->id = $_POST['id'];
        $agendamento->cliente_id = $_POST['cliente_id'];
        $agendamento->servico_id = $_POST['servico_id'];
        $agendamento->data = $_POST['data'];
        $agendamento->horario = $_POST['hora'];
        $agendamento->observacao = $_POST['observacao'];

        $this->agendamentoDAO->atualizar($agendamento);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
        exit;
    }

    public function delete() {
        $id = $_GET['id'];
        $this->agendamentoDAO->excluir($id);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
        exit;
    }
}
