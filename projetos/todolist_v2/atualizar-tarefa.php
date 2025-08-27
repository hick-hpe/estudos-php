<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para atualizar tarefas.";
    exit;
}

if (isset($_POST['id'], $_POST['novoNome'])) {
    $id = (int) $_POST['id'];
    $novoNome = trim($_POST['novoNome']);
    $username = $_SESSION['username'];

    if ($novoNome !== '' && isset($_SESSION['tarefas'][$username][$id])) {
        $_SESSION['tarefas'][$username][$id] = $novoNome;
    }

    $_SESSION["task-message"] = '<div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                                    <i class="bi bi-pencil-square"></i> Tarefa atualizada!!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
}

header("Location: tarefas.php");
exit;