<h1>Lista de Produtos</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['preco'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td>
                    <a href="?classe=ProdutoController&metodo=edit&id=<?= $produto['id'] ?>">Editar</a>
                    <a href="?classe=ProdutoController&metodo=delete&id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?classe=ProdutoController&metodo=create">Novo Produto</a>
