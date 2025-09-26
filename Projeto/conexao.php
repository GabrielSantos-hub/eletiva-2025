<?php

    $dominio = "mysql:host=localhost;dbname=mydb";
    $usuario = "root";
    $senha = "";

    //Tratamento de erros
    try{
        $pdo = new PDO($dominio, $usuario, $senha);
    } 
    catch(Exception $e) {
        die("Erro ao conectar ao banco!".$e->getMessage());
    }
    
?>