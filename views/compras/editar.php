<h1>Editar Compra</h1>
<form method="POST" action="?classe=CompraController&metodo=update&id=<?= $compra['id'] ?>">
    <label>ID do Cliente:</label><br>
    <input type="hidden" name="id" value="<?= $compra['id'] ?>">

    <input type="number" name="cliente_id" value="<?= $compra['cliente_id'] ?>" required><br>

    <label>ID do Produto:</label><br>
    <input type="number" name="produto_id" value="<?= $compra['produto_id'] ?>" required><br>

    <label>Quantidade:</label><br>
    <input type="number" name="quantidade" value="<?= $compra['quantidade'] ?>" required><br>

    <label>Data da Compra:</label><br>
    <input type="date" name="data" value="<?= $compra['data'] ?>" required><br>

    <button type="submit">Atualizar</button>
</form>
<a href="?classe=CompraController&metodo=mostrarTudo">Voltar</a>
