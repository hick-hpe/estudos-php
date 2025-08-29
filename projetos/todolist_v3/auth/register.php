<?php
session_start();

require '../db/conn.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // garantir que a lista existe
    if (!isset($_SESSION["users"])) {
        $_SESSION["users"] = [];
    }

    // verificar se nome de usuário já existe
    foreach ($_SESSION["users"] as $value) {
        if ($value["username"] === $username) {
            $_SESSION["user-existe"] = "O nome de usuário ($username) já está cadastrado!";
            header("Location: ../register-form.php");
            exit;
        }
    }

    unset($_SESSION["user-existe"]);

    // senhas coincidem?
    if ($password !== $confirmPassword) {
        $_SESSION['senhas-diferentes'] = "As senhas não coincidem!";
        header("Location: ../register-form.php");
        exit;
    } else {
        unset($_SESSION['senhas-diferentes']);
    }

    // senha com tamanho mínimo
    if (strlen($password) < 8) {
        $_SESSION['senha-curta'] = "A senha deve ter pelo menos 8 caracteres!";
        header("Location: ../register-form.php");
        exit;
    } else {
        unset($_SESSION['senha-curta']);
    }

    // criar conta no banco
    $username = $conn->real_escape_string($username);
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO Usuario (nome, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
    } else {
        echo "Erro ao inserir o usuário: " . $stmt->error;
        exit;
    }

    
    // sucesso → limpar mensagens de erro
    $_SESSION["message"] = '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <i class="bi bi-plus-circle"></i> Conta criada!!!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
    unset($_SESSION["user-existe"], $_SESSION["senha-curta"], $_SESSION["senhas-diferentes"]);

    // redirecionar para tarefas
    header("Location: ../tarefas.php");

    // fechar conexões
    $stmt->close();
    $conn->close();

    exit;

} else {
    $_SESSION['sem-dados'] = "Dados não fornecidos!";
    header("Location: ../register-form.php");
    exit;
}
