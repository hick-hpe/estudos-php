<?php
session_start();

require '../db/conn.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para excluir sua conta.";
    exit;
}

if (isset($_POST['excluir'])) {
    $username = $_SESSION["username"];

    // Prepara a query
    $stmt = $conn->prepare("DELETE FROM Usuario WHERE nome = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        // Destroi sessão após excluir
        session_destroy();
        header("Location: ../index.php");
    } else {
        echo "Erro ao excluir o usuário: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}