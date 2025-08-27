<?php
// Operadores aritméticos
$a = 10;
$b = 3;
echo "<h2>Operadores Aritméticos</h2>";
echo "$a + $b = " . ($a + $b) . "<br>";
echo "$a - $b = " . ($a - $b) . "<br>";
echo "$a * $b = " . ($a * $b) . "<br>";
echo "$a / $b = " . ($a / $b) . "<br>";
echo "$a % $b = " . ($a % $b) . "<br>";

// Operadores de comparação
echo "<h2>Operadores de Comparação</h2>";
echo "($a == $b) = " . ($a == $b ? "true" : "false") . "<br>";
echo "($a != $b) = " . ($a != $b ? "true" : "false") . "<br>";
echo "($a > $b) = " . ($a > $b ? "true" : "false") . "<br>";
echo "($a < $b) = " . ($a < $b ? "true" : "false") . "<br>";
echo "($a === $b) = " . ($a === $b ? "true" : "false") . "<br>";
echo "($a !== $b) = " . ($a !== $b ? "true" : "false") . "<br>";

// Operadores lógicos
echo "<h2>Operadores Lógicos</h2>";
$x = true;
$y = false;
echo "true && false = " . ($x && $y ? "true" : "false") . "<br>";
echo "true || false = " . ($x || $y ? "true" : "false") . "<br>";
echo "!true = " . (!$x ? "true" : "false") . "<br>";

// Operador de concatenação
echo "<h2>Concatenação</h2>";
$nome = "Henrique";
$sobrenome = "Palermo";
echo $nome . " " . $sobrenome . "<br>";

// Operadores de atribuição
echo "<h2>Atribuição</h2>";
$n = 5;
$n += 10; // soma e atribui
echo "n = $n<br>";
