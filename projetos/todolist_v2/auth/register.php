<?php
session_start();

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

    // criar conta
    $username_data = [
        "username" => $username,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "logado"   => false
    ];
    $_SESSION["users"][] = $username_data;

    // sucesso → limpar mensagens de erro
    unset($_SESSION["user-existe"], $_SESSION["senha-curta"], $_SESSION["senhas-diferentes"]);

    // redirecionar para home
    header("Location: ../index.php");
    exit;

} else {
    $_SESSION['sem-dados'] = "Dados não fornecidos!";
    header("Location: ../register-form.php");
    exit;
}
