<?php

session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    unset($_SESSION['tarefas'][$id]);
    header("Location: index.php");
} else {
    echo "ID não encontrado!";
}


