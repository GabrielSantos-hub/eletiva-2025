<?php
    session_start(); 

    // Limpa todas as variáveis salvas na sessão
    $_SESSION = array();

    // Destrói a sessão completamente
    session_destroy();

    //usuário de volta para a tela de login
    header("location: index.php");
    exit;
?>
