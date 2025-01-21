<h1>Editar Agendamento</h1>
<form method="POST" action="?classe=AgendamentoController&metodo=update&id=<?= $agendamento['id'] ?>">
    <label>ID do Cliente:</label><br>
    <input type="number" name="cliente_id" value="<?= $agendamento['cliente_id'] ?>" required><br>

    <label>ID do Serviço:</label><br>
    <input type="number" name="servico_id" value="<?= $agendamento['servico_id'] ?>" required><br>

    <label>Data:</label><br>
    <input type="date" name="data" value="<?= $agendamento['data'] ?>" required><br>

    <label>Hora:</label><br>
    <input type="time" name="hora" value="<?= $agendamento['horario'] ?>" required><br>

    <label>Observação:</label><br>
    <textarea name="observacao"><?= $agendamento['observacao'] ?></textarea><br>

    <button type="submit">Atualizar</button>
</form>
<a href="?classe=AgendamentoController&metodo=mostrarTudo">Voltar</a>
