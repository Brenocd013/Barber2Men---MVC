<h1>Editar Serviço</h1>
<form method="POST" action="?classe=ServicoController&metodo=update&id=<?= $servico['id'] ?>">
    <label>Nome do Serviço:</label><br>
    <input type="text" name="nome" value="<?= $servico['nome'] ?>" required><br>
    
    <label>Preço:</label><br>
    <input type="text" name="preco" value="<?= $servico['preco'] ?>" required><br>
    
    <label>Descrição:</label><br>
    <textarea name="descricao" required><?= $servico['descricao'] ?></textarea><br>
    
    <button type="submit">Atualizar</button>
</form>
<a href="?classe=ServicoController&metodo=mostrarTudo">Voltar</a>
