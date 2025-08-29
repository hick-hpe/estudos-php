<?php
$host = "mysql";
$user = "root";
$pass = "senha";
$db   = "todolist";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ Erro de conexão: " . $conn->connect_error);
}
?>
