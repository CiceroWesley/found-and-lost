<?php
include ('../model/db.php');
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$id_objeto = $_POST['id_objeto'];
$novo_nome = $_POST['nome'];
$nova_descricao = $_POST['descricao'];
$novo_campus = $_POST['campus'];

$stmt = $con->prepare("UPDATE Objeto SET Nome = ? WHERE Id = ?");
$stmt->bind_param('si',$novo_nome, $id_objeto);
$result = $stmt->execute();
$stmt->close();

$stmt2 = $con->prepare("UPDATE Descricoes SET Campus = ?, Descricao = ? WHERE Fk_id_objeto = ?");
$stmt2->bind_param('ssi',$novo_campus, $nova_descricao,$id_objeto);
$result2 = $stmt2->execute();
$stmt2->close();

if($result && $result2){
    echo "<script> alert('Alterações realizadas com sucesso') </script>"; 
    echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
    exit();
} else{
    echo "<script> alert('Falha ao editar o objeto') </script>"; 
    echo '<script> window.location.href = "../view/objectsAdm.php"</script>';
    exit();
}
?>