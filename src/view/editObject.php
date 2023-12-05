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
      echo "<script>alert('Objeto ja devolvido, não é possível editar.')</script>";
      echo '<script> window.location.href = "objectsAdm.php"</script>';

    }
  ?>
  <main>
    <section>
      <div class="text-center">
        <h3>Editar Objeto</h3>
        <?php echo "<h4>Objeto:$nome</h4>";?>
      </div>
      <div>
        <form class="form-control formulario" action="../controller/editar_obj.php" method="POST">
          <div class="mb-6" style="width: 40%;">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" width="50" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Insira o novo nome.">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
            <input type="text" width="50" name="descricao" class="form-control" id="exampleFormControlInput1" placeholder="Insira uma nova descrição.">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="campus">Selecione o Campus</label>
            <select required name="campus" class="form-select" aria-label="Selecione o campus">
              <option selected value="Juazeiro do Norte">Juazeiro do Norte</option>
              <option value="Crato">Crato</option>
              <option value="Barbalha">Barbalha</option>
              <option value="Brejo Santo">Brejo Santo</option>
              <option value="Ico">Icó</option>
            </select> 
          </div>
          <input type="number" name="id_objeto" value=<?php echo "$id_objeto";?> hidden>
          <br>
          <button type="submit" style="margin-top: 5px;" class="btn btn-success">Editar</button>
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