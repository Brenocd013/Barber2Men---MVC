<h1>Novo Agendamento</h1>
<form method="POST" action="?classe=AgendamentoController&metodo=store">
    <label>ID do Cliente:</label><br>
    <input type="number" name="cliente_id" required><br>

    <label>ID do Serviço:</label><br>
    <input type="number" name="servico_id" required><br>

    <label>Data:</label><br>
    <input type="date" name="data" required><br>

    <label>Horario:</label><br>
    <input type="time" name="hora" required><br>

    <label>Observação:</label><br>
    <textarea name="observacao"></textarea><br>

    <button type="submit">Salvar</button>
</form>
<a href="?classe=AgendamentoController&metodo=mostrarTudo">Voltar</a>
