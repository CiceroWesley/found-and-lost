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
    $devolvido = 0;

    $stmt = $con->prepare("INSERT INTO Objeto (Fk_siape_adm, Nome, Devolvido) VALUES (?, ?, ?)");
    $stmt->bind_param('isi',$_SESSION['siape'], $nome, $devolvido);
    $result = $stmt->execute();
    //id gerado anteriormente capturado
    $lastId = $stmt->insert_id;
    //echo 'ID gerado anteriormente' . $stmt->insert_id;
    $stmt->close();
    if($result){
        echo "<script> alert('Objeto cadastrado!') </script>"; 
        echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
    } else{
        echo 'Falha ao inserir objeto';
        header('Location: ../view/objectsAdm.php');
        exit();
    }


    
    
?>