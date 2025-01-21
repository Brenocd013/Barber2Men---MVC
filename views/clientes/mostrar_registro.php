<h1>Detalhes do Cliente</h1>
<p><strong>Nome:</strong> <?= $cliente['nome'] ?></p>
<p><strong>CPF:</strong> <?= $cliente['cpf'] ?></p>
<p><strong>Data de Nascimento:</strong> <?= $cliente['dt_nasc'] ?></p>
<p><strong>WhatsApp:</strong> <?= $cliente['whatsapp'] ?></p>
<p><strong>Logradouro:</strong> <?= $cliente['logradouro'] ?></p>
<p><strong>Número:</strong> <?= $cliente['num'] ?></p>
<p><strong>Bairro:</strong> <?= $cliente['bairro'] ?></p>
<a href="?classe=ClienteController&metodo=mostrarTudo">Voltar</a>
