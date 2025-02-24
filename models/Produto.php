<?php

require_once 'Conexao.php';

class Produto {
    public static function inserir($dados) {
        $pdo = Conexao::conectar();
        $sql = "INSERT INTO produtos (nome, preco, descricao) 
                VALUES (:nome, :preco, :descricao)";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
    
        return $stmt->execute(); 
    }
    
    public static function mostrarTodos() {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM produtos";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mostrarRegistro($id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function atualizar($dados) {
        $pdo = Conexao::conectar();
        $sql = "UPDATE produtos 
                SET nome = :nome, preco = :preco, descricao = :descricao 
                WHERE id = :id";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    

    public static function deletar($id) {
        $pdo = Conexao::conectar();
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
