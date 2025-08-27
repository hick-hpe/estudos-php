<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para excluir sua conta.";
    exit;
}

// excluir
$username = $_SESSION["username"];
unset($_SESSION["username"]);
foreach ($_SESSION["users"] as $key => $value) {
    if ($username == $value["username"]) {
        unset($_SESSION["users"][$key]);
        break;
    }
}

header("Location: ../index.php");
exit;

