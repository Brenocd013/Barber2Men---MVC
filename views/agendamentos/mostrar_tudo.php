<h1>Lista de Agendamentos</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Serviço</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Observação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agendamentos as $agendamento): ?>
            <tr>
                <td><?= $agendamento['id'] ?></td>
                <td><?= $agendamento['cliente_id'] ?></td>
                <td><?= $agendamento['servico_id'] ?></td>
                <td><?= $agendamento['data'] ?></td>
                <td><?= $agendamento['horario'] ?></td>
                <td><?= $agendamento['observacao'] ?></td>
                <td>
                    <a href="?classe=AgendamentoController&metodo=edit&id=<?= $agendamento['id'] ?>">Editar</a>
                    <a href="?classe=AgendamentoController&metodo=delete&id=<?= $agendamento['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?classe=AgendamentoController&metodo=create">Novo Agendamento</a>
