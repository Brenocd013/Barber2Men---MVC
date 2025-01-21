<?php
require_once "models/Cliente.php";
require_once "models/Servico.php";
require_once "models/Produto.php";
require_once "models/Agendamento.php";
require_once "models/Compra.php";

// Teste da classe Cliente
$clienteModel = new Cliente();
$novoCliente = [
    'nome' => 'João Silva',
    'cpf' => '12345678901',
    'dt_nasc' => '1990-01-01',
    'whatsapp' => '88999999999',
    'logradouro' => 'Rua das Flores',
    'num' => 123,
    'bairro' => 'Centro'
];
$idCliente = $clienteModel->inserir($novoCliente);
echo "Cliente inserido com ID: $idCliente\n";

// Teste da classe Produto
$produtoModel = new Produto();
$novoProduto = [
    'nome' => 'Shampoo Masculino',
    'valor' => 19.90,
    'marca' => 'Marca X',
    'categoria' => 'Higiene'
];
$idProduto = $produtoModel->inserir($novoProduto);
echo "Produto inserido com ID: $idProduto\n";

// Teste da classe Compra
$compraModel = new Compra();

// Inserir uma nova compra
$novaCompra = [
    'cliente_id' => $idCliente,
    'produto_id' => $idProduto,
    'data' => '2025-01-20',
    'horario' => '10:00:00',
    'qtd' => 3
];
$idCompra = $compraModel->inserir($novaCompra);
echo "Compra inserida com ID: $idCompra\n";

// Listar todas as compras
$compras = $compraModel->listarTodos();
print_r($compras);

// Buscar compra por ID
$compra = $compraModel->buscarPorId($idCompra);
print_r($compra);

// Atualizar compra
$compraAtualizada = [
    'cliente_id' => $idCliente,
    'produto_id' => $idProduto,
    'data' => '2025-01-21',
    'horario' => '11:00:00',
    'qtd' => 5
];
$compraModel->atualizar($idCompra, $compraAtualizada);
echo "Compra atualizada.\n";

// Deletar compra
$compraModel->deletar($idCompra);
echo "Compra deletada.\n";
