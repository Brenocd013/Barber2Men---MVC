<h1>Detalhes do Agendamento</h1>
<p><strong>ID do Cliente:</strong> <?= $agendamento['cliente_id'] ?></p>
<p><strong>ID do Serviço:</strong> <?= $agendamento['servico_id'] ?></p>
<p><strong>Data:</strong> <?= $agendamento['data'] ?></p>
<p><strong>Hora:</strong> <?= $agendamento['hora'] ?></p>
<p><strong>Observação:</strong> <?= $agendamento['observacao'] ?></p>
<a href="?classe=AgendamentoController&metodo=mostrarTudo">Voltar</a>
