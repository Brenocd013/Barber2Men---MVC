<?php

require_once 'Conexao.php';

class Compra {
    public static function inserir($dados) {
        $conexao = Conexao::conectar();
        $sql = "INSERT INTO compras (cliente_id, produto_id, quantidade, data) 
                VALUES (:cliente_id, :produto_id, :quantidade, :data)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cliente_id', $dados['cliente_id']);
        $stmt->bindParam(':produto_id', $dados['produto_id']);
        $stmt->bindParam(':quantidade', $dados['quantidade']);
        $stmt->bindParam(':data', $dados['data']);
        $stmt->execute();
    }
    
    public static function mostrarTodos() {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM compras";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mostrarRegistro($id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM compras WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function atualizar($dados) {
        $conexao = Conexao::conectar();
        $sql = "UPDATE compras SET cliente_id = :cliente_id, produto_id = :produto_id, quantidade = :quantidade, data = :data WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cliente_id', $dados['cliente_id']);
        $stmt->bindParam(':produto_id', $dados['produto_id']);
        $stmt->bindParam(':quantidade', $dados['quantidade']);
        $stmt->bindParam(':data', $dados['data']);
        $stmt->bindParam(':id', $dados['id']);
        $stmt->execute();
    }
    

    public static function deletar($id) {
        $pdo = Conexao::conectar();
        $sql = "DELETE FROM compras WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
