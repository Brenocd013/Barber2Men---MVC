<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Editar Agendamento</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="?classe=AgendamentoController&metodo=update&id=<?= $agendamento['id'] ?>">
                        <div class="mb-3">
                            <label class="form-label">ID do Cliente:</label>
                            <input type="number" class="form-control" name="cliente_id" value="<?= $agendamento['cliente_id'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID do Serviço:</label>
                            <input type="number" class="form-control" name="servico_id" value="<?= $agendamento['servico_id'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data:</label>
                            <input type="date" class="form-control" name="data" value="<?= $agendamento['data'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hora:</label>
                            <input type="time" class="form-control" name="hora" value="<?= $agendamento['horario'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Observação:</label>
                            <textarea class="form-control" name="observacao" rows="3"><?= $agendamento['observacao'] ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="?classe=AgendamentoController&metodo=index" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-success">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
