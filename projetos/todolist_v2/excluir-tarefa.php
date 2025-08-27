<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para excluir tarefas.";
    exit;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $username = $_SESSION['username'];
    unset($_SESSION['tarefas'][$username][$id]);
    $_SESSION["task-message"] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                    <i class="bi bi-trash"></i> Tarefa deletada!!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
    header("Location: tarefas.php");
    exit;
} else {
    echo "ID não encontrado!";
}