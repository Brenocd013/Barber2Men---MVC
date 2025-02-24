<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    
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
    <h2 class="text-center mb-4">✏️ Editar Cliente</h2>

    <?php
    if (!isset($cliente) || empty($cliente)) {
        echo "<p class='text-danger text-center'>Erro: Cliente não encontrado.</p>";
        exit;
    }
    ?>

    <form action="?classe=ClienteController&metodo=update" method="POST">
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp:</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= htmlspecialchars($cliente['whatsapp']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Alterações</button>
        <a href="?classe=ClienteController&metodo=index" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
</div>

</body>
</html>
