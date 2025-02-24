<?php
// Obter os parâmetros da URL
$classe = isset($_GET['classe']) ? $_GET['classe'] : 'HomeController';
$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar se o arquivo do Controller existe
if (file_exists("controllers/$classe.php")) {
    require_once "controllers/$classe.php";

    // Verificar se a classe existe
    if (class_exists($classe)) {
        $objeto = new $classe();

        // Verificar se o método existe
        if (method_exists($objeto, $metodo)) {
            // Gerenciar requisições POST e GET
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Se for uma requisição POST, enviar os dados do formulário
                $objeto->$metodo($_POST);
            } elseif ($id !== null) {
                // Se for uma requisição GET com ID, enviar o ID
                $objeto->$metodo($id);
            } else {
                // Chamar o método sem parâmetros
                $objeto->$metodo();
            }
        } else {
            echo "Erro: Método '$metodo' não encontrado na classe '$classe'.";
        }
    } else {
        echo "Erro: Classe '$classe' não encontrada.";
    }
} else {
    echo "Erro: Arquivo do Controller '$classe.php' não encontrado.";
}
