<?php

include_once __DIR__ . '/../../core/Conexao.php';

class AgendamentoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($agendamento)
    {
        // Verifica se o cliente existe
        $stmt = $this->conexao->prepare("SELECT COUNT(*) FROM clientes WHERE id = :cliente_id");
        $stmt->bindParam(':cliente_id', $agendamento->cliente_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->fetchColumn() == 0) {
            return false;
        }

        // Verifica se o serviço existe
        $stmt = $this->conexao->prepare("SELECT COUNT(*) FROM servicos WHERE id = :servico_id");
        $stmt->bindParam(':servico_id', $agendamento->servico_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->fetchColumn() == 0) {
            return false;
        }

        $sql = "INSERT INTO agendamentos (cliente_id, servico_id, data, horario, observacao) 
                VALUES (:cliente_id, :servico_id, :data, :horario, :observacao)";
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindParam(':cliente_id', $agendamento->cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':servico_id', $agendamento->servico_id, PDO::PARAM_INT);
        $stmt->bindParam(':data', $agendamento->data, PDO::PARAM_STR);
        $stmt->bindParam(':horario', $agendamento->horario, PDO::PARAM_STR);
        $stmt->bindParam(':observacao', $agendamento->observacao, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function mostrar_tudo()
    {
        $sql = "SELECT * FROM agendamentos";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_por_id($id)
    {
        $sql = "SELECT * FROM agendamentos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar($agendamento)
    {
        $sql = "UPDATE agendamentos 
                SET cliente_id = :cliente_id, servico_id = :servico_id, data = :data, 
                    horario = :horario, observacao = :observacao 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':id', $agendamento->id, PDO::PARAM_INT);
        $stmt->bindParam(':cliente_id', $agendamento->cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':servico_id', $agendamento->servico_id, PDO::PARAM_INT);
        $stmt->bindParam(':data', $agendamento->data, PDO::PARAM_STR);
        $stmt->bindParam(':horario', $agendamento->horario, PDO::PARAM_STR);
        $stmt->bindParam(':observacao', $agendamento->observacao, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM agendamentos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function verificarClienteExiste($cliente_id) {
        $sql = "SELECT COUNT(*) FROM clientes WHERE id = :cliente_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    
    public function verificarServicoExiste($servico_id) {
        $sql = "SELECT COUNT(*) FROM servicos WHERE id = :servico_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':servico_id', $servico_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    
}
