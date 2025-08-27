<?php
session_start();

if (isset($_POST['id'], $_POST['novoNome'])) {
    $id = (int) $_POST['id'];
    $novoNome = trim($_POST['novoNome']);

    if ($novoNome !== '' && isset($_SESSION['tarefas'][$id])) {
        $_SESSION['tarefas'][$id] = $novoNome;
    }
}

header("Location: index.php");
exit;
