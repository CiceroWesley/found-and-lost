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

    $stmt = $con->prepare("INSERT INTO Objeto (Fk_siape_adm, Nome) VALUES (?, ?)");
    $stmt->bind_param('is',$_SESSION['siape'], $nome);
    $result = $stmt->execute();
    $stmt->close();
    if($result){
        echo '<h1>Alterações realizadas com sucesso</h1>';
        header('Location: ../view/objectsAdm.php');
        exit();
    } else{
        echo 'Falha ao inserir objeto';
        header('Location: ../view/objectsAdm.php');
        exit();
    }


    
    
?>