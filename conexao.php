<?php

$hostname = "localhost";
$bancodedados = "justchat";
$usuario = "root";
$senha = "";

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados, '8111');

if ($conexao->connect_errno) {
    die("Connection failed: " . $conexao->connect_error);
}