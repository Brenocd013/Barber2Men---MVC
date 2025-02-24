<?php

require_once 'models/Agendamento.php';

class AgendamentoController {
    public function index() {
        $agendamentos = Agendamento::mostrarTodos();
        require_once 'views/agendamentos/mostrar_tudo.php';
    }

    public function create() {
        require_once 'views/agendamentos/novo.php';
    }

    public function store() {
        $dados = [
            'cliente_id' => $_POST['cliente_id'],
            'servico_id' => $_POST['servico_id'],
            'data' => $_POST['data'],
            'hora' => $_POST['hora'],
            'observacao' => $_POST['observacao']
        ];
    
        $erro = ""; 
    
       
        if (!Agendamento::verificarClienteExiste($dados['cliente_id'])) {
            $erro .= "❌ Cliente ID " . htmlspecialchars($dados['cliente_id']) . " não encontrado.";
        }
    
        if (!Agendamento::verificarServicoExiste($dados['servico_id'])) {
            $erro .= "❌ Serviço ID " . htmlspecialchars($dados['servico_id']) . " não encontrado.";
        }
    
        if (!empty($erro)) {
            header("Location: ?classe=AgendamentoController&metodo=create&erro=" . urlencode($erro));
            exit;
        }
    
        if (Agendamento::inserir($dados)) {
            header("Location: ?classe=AgendamentoController&metodo=index&msg=Agendamento cadastrado com sucesso!");
            exit;
        } else {
            header("Location: ?classe=AgendamentoController&metodo=create&erro=" . urlencode("Erro ao cadastrar agendamento."));
            exit;
        }
    }
    

    public function edit($id) {
        $agendamento = Agendamento::mostrarRegistro($id);
        require_once 'views/agendamentos/editar.php';
    }

    public function update($dados) {

        $dados['id'] = $_GET['id'];
        Agendamento::atualizar($dados);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
    }

    public function delete($id) {
        Agendamento::deletar($id);
        header("Location: index.php?classe=AgendamentoController&metodo=index");
    }
}
