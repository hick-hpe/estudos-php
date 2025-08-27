<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $tarefas = $_SESSION['tarefas'][$username] ?? [];
} else {
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="bg-light">
    <div class="container shadow p-3 rounded-2">
        <div class="alert alert-success">
            Bem vindo, <strong><?= $_SESSION['username'] ?></strong> <br>
            <a href="auth/logout.php">Sair</a>
            <a href="auth/excluir-conta.php">Excluir conta</a>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="inputPesquisa" class="form-label"><i class="bi bi-search"></i> Pesquise pelas
                    tarefas</label>
                <input type="text" class="form-control" id="inputPesquisa" name="inputPesquisa"
                    placeholder="Pesquise pelas tarefas">
                <?php
                if (isset($_SESSION["task-erro"])) {
                    echo "<small class='text-danger'>" . $_SESSION["task-erro"] . "</small>";
                }
                if (isset($_SESSION["task-message"])) {
                    echo $_SESSION["task-message"];
                    unset($_SESSION["task-message"]);
                }
                ?>
            </div>
        </form>

        <div class="mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adicionarTarefa">
                <i class="bi bi-plus-lg"></i> Adicionar tarefa
            </button>
        </div>

        <div class="table-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tarefas)): ?>
                        <tr>
                            <td colspan="3">Não há tarefas cadastradas.</td>
                        </tr>
                        <li class="list-group-item"></li>
                    <?php else: ?>
                        <?php $contador = 1; ?>
                        <?php foreach ($tarefas as $index => $tarefa): ?>
                            <tr>
                                <th scope="row"><?= $contador ?></th>
                                <td><?= htmlspecialchars($tarefa) ?></td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#atualizarTarefa"
                                        data-id="<?= $index ?>" data-nome="<?= htmlspecialchars($tarefa) ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirTarefa"
                                        data-id="<?= $index ?>" data-nome="<?= htmlspecialchars($tarefa) ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $contador++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para adicionar -->
    <div class="modal fade" id="adicionarTarefa" tabindex="-1" aria-labelledby="adicionarTarefaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarTarefaLabel">Adicionar tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="criar-tarefa.php" method="post">
                        <div class="mb-3">
                            <label for="nomeDaTarefa" class="form-label">Nome da tarefa</label>
                            <input type="text" class="form-control" id="nomeDaTarefa" placeholder="Nome da tarefa"
                                name="nomeDaTarefa">
                        </div>
                        <button type="submit" class="btn btn-success">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para atualizar -->
    <div class="modal fade" id="atualizarTarefa" tabindex="-1" aria-labelledby="atualizarTarefaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="atualizarTarefaLabel">Atualizar tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="atualizar-tarefa.php" method="post">
                        <input type="hidden" name="id" id="tarefaId">
                        <div class="mb-3">
                            <label for="novoNome" class="form-label">Nome da tarefa</label>
                            <input type="text" class="form-control" id="novoNome" name="novoNome">
                        </div>
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para excluir -->
    <div class="modal fade" id="excluirTarefa" tabindex="-1" aria-labelledby="excluirTarefaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excluirTarefaLabel">Excluir tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir-tarefa.php" method="post">
                        <input type="hidden" name="id" id="tarefaId">
                        <div class="mb-3">
                            Deseja excluir a tarefa <strong id="nomeTarefa"></strong>?
                        </div>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal pra excluir conta -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir conta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir sua conta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>