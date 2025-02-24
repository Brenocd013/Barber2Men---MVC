<?php

require_once 'Conexao.php';

class Agendamento {
    public static function inserir($dados) {
        $pdo = Conexao::conectar();
    
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM servicos WHERE id = :servico_id");
        $stmt->bindParam(':servico_id', $dados['servico_id'], PDO::PARAM_INT);
        $stmt->execute();
        $servicoExiste = $stmt->fetchColumn();
    
        if ($servicoExiste == 0) {
            return false;
        }
    
        $sql = "INSERT INTO agendamentos (cliente_id, servico_id, data, horario, observacao) 
                VALUES (:cliente_id, :servico_id, :data, :horario, :observacao)";
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':cliente_id', $dados['cliente_id'], PDO::PARAM_INT);
        $stmt->bindParam(':servico_id', $dados['servico_id'], PDO::PARAM_INT);
        $stmt->bindParam(':data', $dados['data'], PDO::PARAM_STR);
        $stmt->bindParam(':horario', $dados['horario'], PDO::PARAM_STR);  
        $stmt->bindParam(':observacao', $dados['observacao'], PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    
    
    public static function mostrarTodos() {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM agendamentos";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mostrarRegistro($id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM agendamentos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function atualizar($dados) {
        $pdo = Conexao::conectar();
        $sql = "UPDATE agendamentos SET cliente_id = :cliente_id, servico_id = :servico_id, horario = :horario, observacao = :observacao WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $dados['cliente_id']);
        $stmt->bindValue(':servico_id', $dados['servico_id']);
        $stmt->bindValue(':horario', $dados['data'] . ' ' . $dados['hora']); // Combina data e hora
        $stmt->bindValue(':observacao', $dados['observacao']);
        $stmt->bindValue(':id', $dados['id']);
        $stmt->execute();
    }
    public static function verificarClienteExiste($cliente_id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT COUNT(*) FROM clientes WHERE id = :cliente_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    
    public static function verificarServicoExiste($servico_id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT COUNT(*) FROM servicos WHERE id = :servico_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':servico_id', $servico_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    
    public static function deletar($id) {
        $pdo = Conexao::conectar();
        $sql = "DELETE FROM agendamentos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}