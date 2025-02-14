<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente</title>
    
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
    <h2 class="text-center mb-4">➕ Novo Cliente</h2>

    <form method="POST" action="?classe=ClienteController&metodo=store">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" name="dt_nasc" required>
        </div>

        <div class="mb-3">
            <label class="form-label">WhatsApp:</label>
            <input type="text" class="form-control" name="whatsapp" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logradouro:</label>
            <input type="text" class="form-control" name="logradouro" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número:</label>
            <input type="text" class="form-control" name="num" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro:</label>
            <input type="text" class="form-control" name="bairro" required>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a href="?classe=ClienteController&metodo=index" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
</div>

</body>
</html>
