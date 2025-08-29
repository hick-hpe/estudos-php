<?php
session_start();

require '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitização básica
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)) {
        $_SESSION["login-erro"] = "Usuário e senha são obrigatórios!";
        header("Location: ../index.php");
        exit;
    }

    try {
        // Consulta com prepared statement
        $sql = "SELECT nome, senha FROM Usuario WHERE nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();

            // Verifica a senha
            if (password_verify($password, $row["senha"])) {
                $_SESSION["username"] = $row["nome"];
                unset($_SESSION["login-erro"]);

                $stmt->close();
                $conn->close();
                header("Location: ../tarefas.php");
                exit;
            } else {
                $_SESSION["login-erro"] = "Senha incorreta!";
            }
        } else {
            $_SESSION["login-erro"] = "Usuário não encontrado!";
        }

        $stmt->close();
        $conn->close();
        header("Location: ../index.php");
        exit;

    } catch (Exception $e) {
        $_SESSION["login-erro"] = "Erro no sistema: " . $e->getMessage();
        header("Location: ../index.php");
        exit;
    }
} else {
    $_SESSION["login-erro"] = "Requisição inválida!";
    header("Location: ../index.php");
    exit;
}
