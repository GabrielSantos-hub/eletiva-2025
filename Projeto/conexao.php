<?php
$dominio = "mysql:host=localhost;dbname=lavanderia_db";
$usuario = "root";
$senha = "bielsan123"; // minha senha do banco 
// conecta o banco de dados
try {
    $pdo = new PDO($dominio, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erro ao conectar ao banco! " . $e->getMessage());
}
