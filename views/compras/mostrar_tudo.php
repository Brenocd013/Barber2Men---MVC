<h1>Lista de Compras</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($compras as $compra): ?>
            <tr>
                <td><?= $compra['id'] ?></td>
                <td><?= $compra['cliente_id'] ?></td>
                <td><?= $compra['produto_id'] ?></td>
                <td><?= $compra['quantidade'] ?></td>
                <td><?= $compra['data'] ?></td>
                <td>
                    <a href="?classe=CompraController&metodo=edit&id=<?= $compra['id'] ?>">Editar</a>
                    <a href="?classe=CompraController&metodo=delete&id=<?= $compra['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta compra?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?classe=CompraController&metodo=create">Nova Compra</a>
