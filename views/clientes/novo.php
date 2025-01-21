<h1>Novo Cliente</h1>
<form method="POST" action="?classe=ClienteController&metodo=store">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>
    
    <label>CPF:</label><br>
    <input type="text" name="cpf" required><br>
    
    <label>Data de Nascimento:</label><br>
    <input type="date" name="dt_nasc" required><br>
    
    <label>WhatsApp:</label><br>
    <input type="text" name="whatsapp" required><br>
    
    <label>Logradouro:</label><br>
    <input type="text" name="logradouro" required><br>
    
    <label>Número:</label><br>
    <input type="text" name="num" required><br>
    
    <label>Bairro:</label><br>
    <input type="text" name="bairro" required><br>
    
    <button type="submit">Salvar</button>
</form>
