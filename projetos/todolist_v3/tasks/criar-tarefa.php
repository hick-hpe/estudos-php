<?php
session_start();
require '../db/conn.php'; // precisa da conexão

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para adicionar tarefas.";
    exit;
}

if (isset($_POST['nomeDaTarefa']) && trim($_POST['nomeDaTarefa']) !== '') {
    $nomeDaTarefa = trim($_POST['nomeDaTarefa']);
    $username = $_SESSION['username'];

    // cria array de tarefas do usuário caso não exista
    if (!isset($_SESSION['tarefas'][$username])) {
        $_SESSION['tarefas'][$username] = [];
    }

    // adiciona nova tarefa no array de sessão
    $_SESSION['tarefas'][$username][] = $nomeDaTarefa;

    // 🔹 Buscar o ID do usuário
    $stmtUser = $conn->prepare("SELECT id FROM Usuario WHERE nome = ?");
    $stmtUser->bind_param("s", $username);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($row = $resultUser->fetch_assoc()) {
        $UsuarioID = $row['id'];

        // 🔹 Inserir a tarefa no banco
        $stmt = $conn->prepare("INSERT INTO Tarefa (descricao, UsuarioID) VALUES (?, ?)");
        $stmt->bind_param("si", $nomeDaTarefa, $UsuarioID);

        if ($stmt->execute()) {
            unset($_SESSION['task-erro']);
            $_SESSION["task-message"] = '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                            <i class="bi bi-plus-circle"></i> Tarefa criada!!!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
        } else {
            $_SESSION['task-erro'] = "Erro ao salvar no banco: " . $stmt->error;
        }
    } else {
        $_SESSION['task-erro'] = "Usuário não encontrado.";
    }

    // volta para a página de tarefas
    header("Location: tarefas.php");
    exit;
} else {
    $_SESSION['task-erro'] = 'O nome da tarefa deve ser informado!';
    header('Location: tarefas.php');
    exit;
}
