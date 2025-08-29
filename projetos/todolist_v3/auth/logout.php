<?php
session_start();

// Verifica se há usuário logado
if (!isset($_SESSION['username'])) {
    echo "Você precisa estar logado para sair.";
    exit;
}

// Remove apenas o usuário logado
unset($_SESSION["username"]);

$_SESSION["message"] = '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <i class="bi bi-plus-circle"></i> Sessão encerrada!!!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

// Redireciona para a página inicial
header("Location: ../index.php");
exit;
