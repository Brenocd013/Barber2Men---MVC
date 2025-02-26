<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ClienteDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($cliente)
    {
        $sql = "INSERT INTO clientes (nome, cpf, dt_nasc, whatsapp, logradouro, num, bairro) 
                VALUES (:nome, :cpf, :dt_nasc, :whatsapp, :logradouro, :num, :bairro)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':cpf', $cliente->cpf);
        $stmt->bindParam(':dt_nasc', $cliente->dt_nasc);
        $stmt->bindParam(':whatsapp', $cliente->whatsapp);
        $stmt->bindParam(':logradouro', $cliente->logradouro);
        $stmt->bindParam(':num', $cliente->num);
        $stmt->bindParam(':bairro', $cliente->bairro);
        return $stmt->execute();
    }

    public function mostrar_tudo()
    {
        $sql = "SELECT * FROM clientes";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_por_id($id)
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar($cliente)
    {
        $sql = "UPDATE clientes 
                SET nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc,
                    whatsapp = :whatsapp, logradouro = :logradouro,
                    num = :num, bairro = :bairro
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $cliente->id);
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':cpf', $cliente->cpf);
        $stmt->bindParam(':dt_nasc', $cliente->dt_nasc);
        $stmt->bindParam(':whatsapp', $cliente->whatsapp);
        $stmt->bindParam(':logradouro', $cliente->logradouro);
        $stmt->bindParam(':num', $cliente->num);
        $stmt->bindParam(':bairro', $cliente->bairro);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function buscar_por_nome($nome)
    {
        $nome = "%$nome%";
        $sql = "SELECT * FROM clientes WHERE nome LIKE :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function buscar_por_cpf($cpf)
    {
        $sql = "SELECT * FROM clientes WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function contar_clientes()
    {
        $sql = "SELECT COUNT(*) as total FROM clientes";
        return $this->conexao->query($sql)->fetch(PDO::FETCH_OBJ)->total;
    }
}