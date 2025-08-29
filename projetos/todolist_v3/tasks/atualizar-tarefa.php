<?php
session_start();
require '../db/conn.php';

if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para atualizar tarefas.";
    exit;
}

if (isset($_POST['id'], $_POST['novoNome'])) {
    $id = (int) $_POST['id'];
    $novoNome = trim($_POST['novoNome']);
    $username = $_SESSION['username'];

    if ($novoNome !== '') {
        $sql = "UPDATE Tarefa SET descricao = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $novoNome, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $_SESSION["task-message"] = '<div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                    <i class="bi bi-pencil-square"></i> Tarefa atualizada!!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $_SESSION["task-message"] = '<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <i class="bi bi-pencil-square"></i> Nenhuma tarefa foi alterada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } else {
            $_SESSION["task-message"] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-pencil-square"></i> Erro ao atualizar: ' . $stmt->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        $stmt->close();
    }

    header("Location: tarefas.php");
    exit;
}
?>
