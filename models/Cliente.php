<?php

require_once 'Conexao.php';

class Cliente {
    public static function inserir($dados) {
        $pdo = Conexao::conectar();
        $sql = "INSERT INTO clientes (nome, cpf, dt_nasc, whatsapp, logradouro, num, bairro) 
                VALUES (:nome, :cpf, :dt_nasc, :whatsapp, :logradouro, :num, :bairro)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($dados);
    }

    public static function mostrarTodos() {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM clientes";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mostrarRegistro($id) {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function atualizar($dados) {
        $pdo = Conexao::conectar();
        $sql = "UPDATE clientes 
                SET nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc, 
                    whatsapp = :whatsapp, logradouro = :logradouro, 
                    num = :num, bairro = :bairro 
                WHERE id = :id";
    
        $stmt = $pdo->prepare($sql);
    
        // Mapeia os parâmetros corretamente
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':dt_nasc', $dados['dt_nasc'], PDO::PARAM_STR);
        $stmt->bindParam(':whatsapp', $dados['whatsapp'], PDO::PARAM_STR);
        $stmt->bindParam(':logradouro', $dados['logradouro'], PDO::PARAM_STR);
        $stmt->bindParam(':num', $dados['num'], PDO::PARAM_INT);
        $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);
    
        return $stmt->execute(); // Executa a consulta
    }
    
    
    public static function deletar($id) {
        $pdo = Conexao::conectar();
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}