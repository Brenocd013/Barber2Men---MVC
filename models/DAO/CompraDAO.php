<?php

include_once __DIR__ . '/../../core/Conexao.php';

class CompraDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($compra)
    {
        $sql = "INSERT INTO compras (cliente_id, produto_id, quantidade, data) 
                VALUES (:cliente_id, :produto_id, :quantidade, :data)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':cliente_id', $compra->cliente_id);
        $stmt->bindParam(':produto_id', $compra->produto_id);
        $stmt->bindParam(':quantidade', $compra->quantidade);
        $stmt->bindParam(':data', $compra->data);
        return $stmt->execute();
    }

    public function mostrar_tudo()
    {
        $sql = "SELECT * FROM compras";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_por_id($id)
    {
        $sql = "SELECT * FROM compras WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar($compra)
    {
        $sql = "UPDATE compras SET cliente_id = :cliente_id, produto_id = :produto_id, 
                quantidade = :quantidade, data = :data WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $compra->id);
        $stmt->bindParam(':cliente_id', $compra->cliente_id);
        $stmt->bindParam(':produto_id', $compra->produto_id);
        $stmt->bindParam(':quantidade', $compra->quantidade);
        $stmt->bindParam(':data', $compra->data);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM compras WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
