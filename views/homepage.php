<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .menu {
            margin-top: 20px;
        }
        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à Homepage</h1>
    <p>Escolha uma das opções abaixo para navegar pelo sistema:</p>
    <div class="menu">
        <a href="index.php?classe=ClienteController&metodo=index">Gerenciar Clientes</a>
        <a href="index.php?classe=ServicoController&metodo=index">Gerenciar Serviços</a>
        <a href="index.php?classe=ProdutoController&metodo=index">Gerenciar Produtos</a>
        <a href="index.php?classe=AgendamentoController&metodo=index">Gerenciar Agendamentos</a>
        <a href="index.php?classe=CompraController&metodo=index">Gerenciar Compras</a>
    </div>
</body>
</html>
