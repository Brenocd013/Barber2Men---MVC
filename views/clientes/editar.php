<h1>Editar Cliente</h1>
<form method="POST" action="?classe=ClienteController&metodo=update&id=<?= $cliente['id'] ?>">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br>
    
    <label>CPF:</label><br>
    <input type="text" name="cpf" value="<?= $cliente['cpf'] ?>" required><br>
    
    <label>Data de Nascimento:</label><br>
    <input type="date" name="dt_nasc" value="<?= $cliente['dt_nasc'] ?>" required><br>
    
    <label>WhatsApp:</label><br>
    <input type="text" name="whatsapp" value="<?= $cliente['whatsapp'] ?>" required><br>
    
    <label>Logradouro:</label><br>
    <input type="text" name="logradouro" value="<?= $cliente['logradouro'] ?>" required><br>
    
    <label>Número:</label><br>
    <input type="text" name="num" value="<?= $cliente['num'] ?>" required><br>
    
    <label>Bairro:</label><br>
    <input type="text" name="bairro" value="<?= $cliente['bairro'] ?>" required><br>
    
    <button type="submit">Atualizar</button>
</form>
