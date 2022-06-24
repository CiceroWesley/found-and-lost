<?php
    include ('../model/db.php');
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

    $id_objeto = $_GET['id'];
    $devolvido = 1;
    $stmt = $con->prepare("UPDATE Objeto SET Devolvido = ? WHERE Id = ?");
    $stmt->bind_param('ii',$devolvido, $id_objeto);
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