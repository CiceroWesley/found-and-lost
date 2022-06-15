<?php
    include ('../model/db.php');
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

    $nome = $_POST['nome'];
    $campus = $_POST['Campus'];
    $descricao = $_POST['descricao'];
    
    
?>