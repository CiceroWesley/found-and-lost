<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php 
    //inclusão head
    include ('head.php');
  ?>
</head>
<body>
  <?php 
    //inclusão cabeçalho
    include('header.php');
    include('../model/db.php');
    $id_objeto =  $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM Objeto WHERE Id =?");
    $stmt->bind_param('i',$id_objeto);
    $result = $stmt->execute();
    $stmt->store_result();
    $linhas = $stmt->num_rows;
    $stmt->bind_result($id, $siape,$nome,$data,$devolvido);
    $stmt->fetch();

    if($linhas == 0){
      echo "<script> alert('Objeto não existe!') </script>"; 
      echo '<script> window.location.href = "index.php"</script>';
    }

    $stmt2 = $con->prepare("SELECT Campus, Descricao FROM Descricoes WHERE Fk_id_objeto =?");
    $stmt2->bind_param('i',$id_objeto);
    $result2 = $stmt2->execute();
    $stmt2->store_result();
    $linhas2 = $stmt2->num_rows;
    $stmt2->bind_result($campus, $descricao);
    $stmt2->fetch();

    $stmt3 = $con->prepare("SELECT Foto FROM Fotos WHERE Fk_id_objeto =?");
    $stmt3->bind_param('i',$id_objeto);
    $result = $stmt3->execute();
    $stmt3->store_result();
    $linhas3 = $stmt3->num_rows;
    $stmt3->bind_result($foto);
    $fotos = [];
    while($stmt3->fetch()){
      array_push($fotos,$foto);
    }
  ?>
  <main>
    <section>
      <div class="text-center">
        <?php echo "<h3>Objeto: $nome</h3>";?>
        <?php echo "<h3>Perdido no campus $campus</h3>";?>
      </div>
      <div class="text-center">
        <h4>Descrição:</h4>
        <?php echo "<p>$descricao</p>"; ?>
        <h4>Imagens</h4>
        <?php
          for($i = 0; $i < $linhas3; $i++){
            echo '<img src='."$fotos[$i]".' class="card-img-top" style="width: 50%; margin: 5px;" alt="Imagens dos objetos perdidos">';
          }
        ?>
      </div>
    </section>
  </main>
  <?php 
    //inclusão rodape
    include('footer.php');
  ?>
</body>
</html>