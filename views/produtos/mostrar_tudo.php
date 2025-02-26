<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos</title>
    
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
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .btn {
            margin: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>🛒 Gerenciar Produtos</h2>
        <a href="index.php" class="btn btn-outline-primary"><i class="fas fa-home"></i> Voltar à Home</a>
    </div>

    <!-- Barra de pesquisa -->
    <input type="text" id="search" class="form-control mb-3" placeholder="🔍 Buscar produto..." onkeyup="filtrarProdutos()">

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto->id ?></td>
                    <td><?= $produto->nome ?></td>
                    <td>R$ <?= number_format($produto->preco, 2, ',', '.') ?></td>
                    <td><?= $produto->descricao ?></td>
                    <td>
                        <a href="?classe=ProdutoController&metodo=edit&id=<?= $produto->id ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="?classe=ProdutoController&metodo=delete&id=<?= $produto->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="?classe=ProdutoController&metodo=create" class="btn btn-success"><i class="fas fa-plus"></i> Novo Produto</a>
</div>

<script>
    function filtrarProdutos() {
        let input = document.getElementById("search").value.toUpperCase();
        let table = document.querySelector("table tbody");
        let rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let td = rows[i].getElementsByTagName("td")[1]; 
            if (td) {
                let texto = td.textContent || td.innerText;
                rows[i].style.display = texto.toUpperCase().indexOf(input) > -1 ? "" : "none";
            }
        }
    }
</script>

</body>
</html>