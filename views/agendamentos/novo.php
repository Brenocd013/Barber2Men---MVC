<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Agendamento</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">📅 Novo Agendamento</h2>

    <!-- Exibir mensagem de erro -->
    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars(urldecode($_GET['erro'])) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="?classe=AgendamentoController&metodo=store">
        <div class="mb-3">
            <label class="form-label">ID do Cliente:</label>
            <input type="number" class="form-control" name="cliente_id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ID do Serviço:</label>
            <input type="number" class="form-control" name="servico_id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data:</label>
            <input type="date" class="form-control" name="data" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Horário:</label>
            <input type="time" class="form-control" name="hora" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Observação:</label>
            <textarea class="form-control" name="observacao" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a href="?classe=AgendamentoController&metodo=index" class="btn btn-secondary">Voltar</a>

    </form>
</div>

</body>
</html>
