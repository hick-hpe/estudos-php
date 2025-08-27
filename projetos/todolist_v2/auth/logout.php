<?php
session_start();

// Verifica se há usuário logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para sair.";
    exit;
}

// Remove apenas o usuário logado
unset($_SESSION["username"]);

// Redireciona para a página inicial
header("Location: ../index.php");
exit;
