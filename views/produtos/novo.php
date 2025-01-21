<h1>Novo Produto</h1>
<form method="POST" action="?classe=ProdutoController&metodo=store">
    <label>Nome do Produto:</label><br>
    <input type="text" name="nome" required><br>

    <label>Preço:</label><br>
    <input type="text" name="preco" required><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br>

    <button type="submit">Salvar</button>
</form>
<a href="?classe=ProdutoController&metodo=mostrarTudo">Voltar</a>
