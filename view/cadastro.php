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
    //session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
      header('Location: index.php');
      exit;
    }
  ?>
  <main>
    <section>
      <div class="text-center">
        <h3>Cadastro de Objetos</h3>
      </div>
      <div>
        <form class="form-control formulario" action="../controller/cadastro_obj.php" method="POST" enctype="multipart/form-data">
          <div class="mb-6" style="width: 40%;">
            <label for="nome" class="form-label">Nome</label>
            <input requerid type="text" width="50" class="form-control" id="nome" name="nome" placeholder="nome do objeto">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="Campus">Campus</label>
            <input list="Campus" name="campus" width="50" class="form-control">
              <datalist id="Campus">
                <option value="Juazeiro do Norte">
                <option value="Brejo Santo">
                <option value="Barbalha"> 
                <option value="Crato">
                <option value="Icó">
              </datalist>
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="descricao" class="form-label">Descrição</label>
            <input require type="text" width="50" class="form-control" id="descricao" name="descricao" placeholder="insira a descrição">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="formFileMultiple" class="form-label">Insira as fotos do objeto</label>
            <input class="form-control" type="file" id="formFileMultiple" multiple>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
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