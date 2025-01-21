<h1>Nova Compra</h1>
<form method="POST" action="?classe=CompraController&metodo=store">
    <label>ID do Cliente:</label><br>
    <input type="number" name="cliente_id" required><br>

    <label>ID do Produto:</label><br>
    <input type="number" name="produto_id" required><br>

    <label>Quantidade:</label><br>
    <input type="number" name="quantidade" required><br>

    <label>Data da Compra:</label><br>
    <input type="date" name="data" required><br>

    <button type="submit">Salvar</button>
</form>
<a href="?classe=CompraController&metodo=mostrarTudo">Voltar</a>
