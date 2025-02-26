<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($produto)
    {
        $sql = "INSERT INTO produtos (nome, preco, descricao) 
                VALUES (:nome, :preco, :descricao)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $produto->nome, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $produto->preco, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $produto->descricao, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function mostrar_tudo()
    {
        $sql = "SELECT * FROM produtos";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_por_id($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar($produto)
    {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $produto->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $produto->nome, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $produto->preco, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $produto->descricao, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
