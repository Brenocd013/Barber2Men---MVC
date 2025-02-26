<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    
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
    <h2 class="text-center mb-4">✏️ Editar Produto</h2>

    <form method="POST" action="?classe=ProdutoController&metodo=update">
        <input type="hidden" name="id" value="<?= $produto->id ?>">

        <div class="mb-3">
            <label class="form-label">Nome do Produto:</label>
            <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($produto->nome) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="number" step="0.01" class="form-control" name="preco" value="<?= htmlspecialchars($produto->preco) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <textarea class="form-control" name="descricao" rows="3" required><?= htmlspecialchars($produto->descricao) ?></textarea>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Atualizar</button>
        <a href="?classe=ProdutoController&metodo=index" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
</div>

</body>
</html>
