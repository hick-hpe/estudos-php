<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // verifica se existe lista de usuários
    if (!isset($_SESSION["users"]) || empty($_SESSION["users"])) {
        $_SESSION["login-erro"] = "Nenhum usuário cadastrado!";
        header("Location: ../index.php");
        exit;
    }

    $usuarioEncontrado = false;

    // percorre os usuários cadastrados
    foreach ($_SESSION["users"] as &$user) {
        if ($user["username"] === $username) {
            // verifica a senha
            if (password_verify($password, $user["password"])) {
                $user["logado"] = true; // marca como logado
                $_SESSION["username"] = $username; // guarda usuário logado
                $usuarioEncontrado = true;

                // limpa mensagem de erro de login se existir
                if (isset($_SESSION["login-erro"])) {
                    unset($_SESSION["login-erro"]);
                }

                // redireciona para a página inicial/tarefas
                header("Location: ../tarefas.php");
                exit;
            } else {
                $_SESSION["login-erro"] = "Senha incorreta!";
                header("Location: ../index.php");
                exit;
            }
        }
    }

    if (!$usuarioEncontrado) {
        $_SESSION["login-erro"] = "Usuário não encontrado!";
        header("Location: ../index.php");
        exit;
    }

} else {
    $_SESSION["login-erro"] = "Dados não fornecidos!";
    header("Location: ../index.php");
    exit;
}
