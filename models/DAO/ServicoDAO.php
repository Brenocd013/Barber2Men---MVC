<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ServicoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($servico)
    {
        $sql = "INSERT INTO servicos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $servico->nome, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $servico->preco, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $servico->descricao, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function mostrar_tudo()
    {
        $sql = "SELECT * FROM servicos";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_por_id($id)
    {
        $sql = "SELECT * FROM servicos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar($servico)
    {
        $sql = "UPDATE servicos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $servico->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $servico->nome, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $servico->preco, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $servico->descricao, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM servicos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
