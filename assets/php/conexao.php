<?php

$servername = "localhost";
$username = 'José Morais';
$password = 'Morais912';
$database = 'chefvirtual';

// 'new' é usado para criar o 'mysqli', que representa uma conexão com o banco de dados MySQL.
$mysqli = new mysqli($servername, $username, $password, $database);

if($mysqli->error) {
    die("Erro na conexão" . $mysqli->error);
}

?>