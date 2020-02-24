<?php
require ("vendor/autoload.php");
$stack = new \App\Http\BracketsBalance();

$brackets = "{([])}";
echo $stack->bracketsBalance($brackets) ? 'Верно' : 'Не верно';
