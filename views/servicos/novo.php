<h1>Novo Serviço</h1>
<form method="POST" action="?classe=ServicoController&metodo=store">
    <label>Nome do Serviço:</label><br>
    <input type="text" name="nome" required><br>
    
    <label>Preço:</label><br>
    <input type="text" name="preco" required><br>
    
    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br>
    
    <button type="submit">Salvar</button>
</form>
<a href="?classe=ServicoController&metodo=mostrarTudo">Voltar</a>
