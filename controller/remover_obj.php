<?php
    include ('../model/db.php');
    session_start();
 
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }
    
    //$i=filter_input(INPUT_GET, "i", FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM Objeto WHERE Id=?");
    $stmt->bind_param('i',$id);
    $result = $stmt->execute();
    $stmt->close();
    if($result){
        header('Location: ../view/objectsAdm.php');
        echo '<h1>Objeto removido com sucesso</h1>';
        exit();
    } else{
        echo 'Falha ao remover objeto';
        //header('Location: ../view/objectsAdm.php');
        exit();
    }

   /*
    if(!empty($i)){
        $query_usuario="DELETE FROM Objeto WHERE Id=:'i'";
        $result_usuario=$con->prepare($query_usuario);
        $result_usuario->bindParam('i', $i);

        if($result_usuario->execute()){
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuario apagado com sucesso!</div>"];
    
        }else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Uusuario não apagado com sucesso!</div>"];
        }
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuario encontrado!</div>"];
    }*/

?>