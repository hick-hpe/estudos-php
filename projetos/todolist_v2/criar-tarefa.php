<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para adicionar tarefas.";
    exit;
}

if (isset($_POST['nomeDaTarefa']) && trim($_POST['nomeDaTarefa']) !== '') {
    $nomeDaTarefa = trim($_POST['nomeDaTarefa']);
    $username = $_SESSION['username'];

    // cria array de tarefas do usuário caso não exista
    if (!isset($_SESSION['tarefas'][$username])) {
        $_SESSION['tarefas'][$username] = [];
    }

    // adiciona nova tarefa
    $_SESSION['tarefas'][$username][] = $nomeDaTarefa;

    unset($_SESSION['task-erro']);
    $_SESSION["task-message"] = '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    <i class="bi bi-plus-circle"></i> Tarefa criada!!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
    
    // volta para a página de tarefas
    header("Location: tarefas.php");
    exit;
} else {
    $_SESSION['task-erro'] = 'O nome da tarefa deve ser informado!';
    header('Location: tarefas.php');
    exit;
}
