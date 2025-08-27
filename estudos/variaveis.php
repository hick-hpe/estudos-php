<?php
// Definição de variáveis
$nome = "Henrique";
$idade = 18;
$altura = 1.75;
$estudante = true;
$habilidades = ["PHP", "JavaScript", "Python"];

// Definição de constante
define("PAIS", "Brasil");

// Exibição das variáveis
echo "<h1>Informações</h1>";
echo "Nome: $nome <br>";
echo "Idade: $idade anos <br>";
echo "Altura: $altura m <br>";
echo "Estudante: " . ($estudante ? "Sim" : "Não") . "<br>";
echo "País: " . PAIS . "<br>";

// Exibindo array
echo "<h2>Habilidades:</h2>";
foreach ($habilidades as $h) {
    echo "- $h <br>";
}

// com print_r
// print_r($habilidades);

// Exemplo de variável global
function mostrarNomeGlobal() {
    global $nome;
    echo "<br>Nome acessado dentro da função (escopo global): $nome";
}

mostrarNomeGlobal();

// Exemplo de superglobal
echo "<h2>Superglobais</h2>";

// $_SERVER
echo "Arquivo atual: {$_SERVER['PHP_SELF']} <br>";
echo "Endereço do servidor: " . $_SERVER['SERVER_NAME'] . "<br>";

// $_GET
echo "<br>Valor de parâmetro 'teste' via GET: ";
if (isset($_GET['teste'])) {
    echo $_GET['teste'];
} else {
    echo "(nenhum valor passado)";
}

// $_POST
echo "<br><br>Valor de parâmetro 'teste' via POST: ";
if (isset($_POST['teste'])) {
    echo $_POST['teste'];
} else {
    echo "(nenhum valor passado)";
}

// $_COOKIE
echo "<br><br>Valor do cookie 'usuario': ";
if (isset($_COOKIE['usuario'])) {
    echo $_COOKIE['usuario'];
} else {
    echo "(cookie não definido)";
}

echo "<br><br>";

// $_SERVER
// var_dump($_SERVER);
?>
