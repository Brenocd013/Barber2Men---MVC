<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Compra</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🛍️ Nova Compra</h2>

    <form method="POST" action="?classe=CompraController&metodo=store">
        <div class="mb-3">
            <label class="form-label">ID do Cliente:</label>
            <input type="number" class="form-control" name="cliente_id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ID do Produto:</label>
            <input type="number" class="form-control" name="produto_id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade:</label>
            <input type="number" class="form-control" name="quantidade" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data da Compra:</label>
            <input type="date" class="form-control" name="data" required>
        </div>

        <div class="btn-custom">
            <a href="?classe=CompraController&metodo=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar
            </button>
        </div>
    </form>
</div>

</body>
</html>
