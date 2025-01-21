<h1>Lista de Serviços</h1>
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
        <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><?= $servico['id'] ?></td>
                <td><?= $servico['nome'] ?></td>
                <td><?= $servico['preco'] ?></td>
                <td><?= $servico['descricao'] ?></td>
                <td>
                    <a href="?classe=ServicoController&metodo=edit&id=<?= $servico['id'] ?>">Editar</a>
                    <a href="?classe=ServicoController&metodo=delete&id=<?= $servico['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?classe=ServicoController&metodo=create">Novo Serviço</a>
