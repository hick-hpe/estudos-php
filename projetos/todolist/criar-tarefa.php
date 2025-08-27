<?php
session_start();

if (isset($_POST['nomeDaTarefa']) && trim($_POST['nomeDaTarefa']) !== '') {
    $nomeDaTarefa = trim($_POST['nomeDaTarefa']);

    // cria array de tarefas caso não exista
    if (!isset($_SESSION['tarefas'])) {
        $_SESSION['tarefas'] = [];
    }

    // adiciona nova tarefa
    $_SESSION['tarefas'][] = $nomeDaTarefa;

    // volta para a página inicial
    header("Location: index.php");
    exit;
} else {
    echo "O nome deve ser passado!";
}
