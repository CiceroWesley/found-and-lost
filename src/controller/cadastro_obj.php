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
    $foto = '';

    
    $tipos_permitidos = array('jpg', 'jpeg', 'png');

    $tamanho_maximo = 4 * 1024 * 1024;





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

    foreach ($_FILES['fotos']['tmp_name'] as $key => $value) {
        $file_tmpname = $_FILES['fotos']['tmp_name'][$key];
        $file_name = $_FILES['fotos']['name'][$key];
        $file_size = $_FILES['fotos']['size'][$key];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        //$foto = $upload_dir.$file_name.$lastId;
        $novo_nome = str_replace(' ','',$file_name);
        $upload_dir = "../uploads/".$lastId.$novo_nome;



        if(in_array(strtolower($file_ext), $tipos_permitidos)) {
            if ($file_size > $tamanho_maximo)        
                echo "Error: File size is larger than the allowed limit.";

            if( move_uploaded_file($file_tmpname, $upload_dir)) {
                echo "{$file_name} successfully uploaded <br />";
            }
            else {                    
                echo "Error uploading {$file_name} <br />";
                //remover o objeto inserido anteriormente
                $stmt = $con->prepare("DELETE FROM Objeto WHERE Id=?");
                $stmt->bind_param('i',$lastId);
                $result = $stmt->execute();
                $stmt->close();
                exit();
            }    
        }
        else {
                 
            // If file extension not valid
            //remover o objeto inserido anterioemten
            $stmt = $con->prepare("DELETE FROM Objeto WHERE Id=?");
            $stmt->bind_param('i',$lastId);
            $result = $stmt->execute();
            $stmt->close();
            echo "Error uploading {$file_name} ";
            echo "({$file_ext} file type is not allowed)<br / >";
            exit();
        }

        $stmt = $con->prepare("INSERT INTO Fotos (Fk_id_objeto, Foto) VALUES (?, ?)");
        $stmt->bind_param('is',$lastId, $upload_dir);
        $result3 = $stmt->execute();

    }





    //inserindo o caminho da foto salva no servidor
    

    //fechando conexão
    $stmt->close();


    if($result3){
        echo "<script> alert('Objeto cadastrado!') </script>"; 
        echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
    } else{
        echo "<script> alert('Falha ao inserir objeto') </script>"; 
        echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
        exit();
    }
?>