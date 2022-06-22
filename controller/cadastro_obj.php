<?php
    include ('../model/db.php');
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

    $nome = $_POST['nome'];
    $campus = $_POST['campus'];
    $descricao = $_POST['descricao'];
    $devolvido = 0;
    $foto = 'caminho';

    $stmt = $con->prepare("INSERT INTO Objeto (Fk_siape_adm, Nome, Devolvido) VALUES (?, ?, ?)");
    $stmt->bind_param('isi',$_SESSION['siape'], $nome, $devolvido);
    $result = $stmt->execute();
    //id gerado anteriormente capturado
    $lastId = $stmt->insert_id;
    //inserindo a descrição do objeto na tabela Descricoes
    $stmt = $con->prepare("INSERT INTO Descricoes (Fk_id_objeto, Campus, Descricao) VALUES (?, ?, ?)");
    $stmt->bind_param('iss',$lastId, $campus, $descricao);
    $result2 = $stmt->execute();
    //$stmt->close();

    //inserindo o caminho da foto salva no servidor
    $stmt = $con->prepare("INSERT INTO Fotos (Fk_id_objeto, Foto) VALUES (?, ?)");
    $stmt->bind_param('is',$lastId, $foto);
    $result3 = $stmt->execute();

    //fechando conexão
    $stmt->close();


    if($result3){
        echo "<script> alert('Objeto cadastrado!') </script>"; 
        echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
    } else{
        echo 'Falha ao inserir objeto';
        header('Location: ../view/objectsAdm.php');
        exit();
    }


    
    
?>