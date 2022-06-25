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
    include('headerAdm.php');
    include('../model/db.php');
    $id_objeto =  $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM Objeto WHERE Id =?");
    $stmt->bind_param('i',$id_objeto);
    $result = $stmt->execute();
    $stmt->store_result();
    $linhas = $stmt->num_rows;

    $stmt->bind_result($id, $siape,$nome,$data,$devolvido);
    $stmt->fetch();

    if($devolvido){
      echo "<script>alert('Objeto ja devolvido')</script>";
      echo '<script> window.location.href = "objectsAdm.php"</script>';

    }
  ?>
  <main>
      <section>
          <div class="text-center">
              <h2>Devolver objeto</h2>
              <?php echo '<h4>Objeto: '.$nome.'</h4>';?>
          </div>
          <div>
            <form class="form-control formulario" action="../controller/devolver_obj.php" method="POST" enctype="multipart/form-data">
                <div class="mb-6" style="width: 40%;">
                  <label for="proprietario" class="form-label">Email do proprietário</label>
                  <input type="email" width="50" name='email' class="form-control" id="proprietario" placeholder="Insira o email do proprietário">
                  <input type="number" name="id_objeto" value="<?php echo $id_objeto;?>" hidden>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Devolver</button>
              </form>
          </div>
      </section>
  </main>
  <?php 
    //inclusão rodape
    include('footer.php');
  ?>
</body>
</html>