<?php

$receitasPorPagina = 16;

// Verifica se a variável 'pagina' foi definida na URL.
// Se sim, usa esse valor como a página atual. Caso contrário, define a página atual como 1.
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Calcula o início da consulta com base na página atual e no número de receitas por página.
// Isso é usado para determinar a partir de qual receita a consulta SQL deve começar.
// Por exemplo, se cada página mostra 16 receitas e estamos na página 2, então queremos começar na receita 16 (porque as receitas 0 a 15 foram mostradas na página 1).
$inicio = ($paginaAtual - 1) * $receitasPorPagina;

// Executa uma consulta SQL que conta o número total de linhas (receitas).
$sql = "SELECT COUNT(*) as total FROM receitas";

// Executa a consulta SQL e armazena o resultado.
$result = $mysqli->query($sql);

// Guarda o resultada na row (linha)
$row = $result->fetch_assoc();

// Obtém o número total de receitas do resultado da consulta.
$totalReceitas = $row['total'];

// Calcula o número total de páginas dividindo o número total de receitas pelo número de receitas por página.
// A função ceil() é usada para arredondar para cima, garantindo que haja páginas suficientes para todas as receitas.
$totalPaginas = ceil($totalReceitas / $receitasPorPagina);

?>
