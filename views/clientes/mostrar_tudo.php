<h1>Lista de Clientes</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>WhatsApp</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['cpf'] ?></td>
                <td><?= $cliente['whatsapp'] ?></td>
                <td>
                    <a href="?classe=ClienteController&metodo=edit&id=<?= $cliente['id'] ?>">Editar</a>
                    <a href="?classe=ClienteController&metodo=delete&id=<?= $cliente['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?classe=ClienteController&metodo=create">Novo Cliente</a>
