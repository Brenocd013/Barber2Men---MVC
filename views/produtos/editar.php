<h1>Editar Produto</h1>
<form method="POST" action="?classe=ProdutoController&metodo=update&id=<?= $produto['id'] ?>">
    <label>Nome do Produto:</label><br>
    <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br>

    <label>Preço:</label><br>
    <input type="text" name="preco" value="<?= $produto['preco'] ?>" required><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" required><?= $produto['descricao'] ?></textarea><br>

    <button type="submit">Atualizar</button>
</form>
<a href="?classe=ProdutoController&metodo=mostrarTudo">Voltar</a>
