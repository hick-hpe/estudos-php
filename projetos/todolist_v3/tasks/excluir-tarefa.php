<?php
session_start();
require '../db/conn.php'; // conexão com o banco

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para excluir tarefas.";
    exit;
}

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $username = $_SESSION['username'];

    // Remove da sessão
    if (isset($_SESSION['tarefas'][$username][$id])) {
        unset($_SESSION['tarefas'][$username][$id]);
    }

    // Remove do banco de dados
    $sql = "DELETE FROM Tarefa WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION["task-message"] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        <i class="bi bi-trash"></i> Tarefa deletada!!!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
    } else {
        $_SESSION["task-message"] = '<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        <i class="bi bi-exclamation-triangle"></i> Erro ao deletar: ' . $stmt->error . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
    }

    $stmt->close();
    $conn->close();

    header("Location: tarefas.php");
    exit;
} else {
    echo "ID não encontrado!";
}
?>
