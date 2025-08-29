<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todolist - Autenticação de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="bg-light">
    <div class="container shadow p-3 rounded-2">
        <form action="auth/register.php" method="post">
            <div class="mb-3">
                <h1 class="text-center">Cadastro</h1>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <?php
                    if (isset($_SESSION["user-existe"])) {
                        echo "<small class='text-danger'>" . $_SESSION["user-existe"] . "</small>";
                    }
                ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                <?php
                    if (isset($_SESSION["senha-curta"])) {
                        echo "<small class='text-danger'>" . $_SESSION["senha-curta"] . "</small>";
                    }
                ?>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                    placeholder="Confirme sua senha" required>
                    <?php
                    if (isset($_SESSION["senhas-diferentes"])) {
                        echo "<small class='text-danger'>" . $_SESSION["senhas-diferentes"] . "</small>";
                    }
                ?>
            </div>

            <div class="mb-3">
                <a href="index.php">Já tem conta? Entrar</a>
            </div>

            <button type="submit" class="btn btn-success">Criar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>