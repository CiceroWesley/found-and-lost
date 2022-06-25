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
            <input requerid type="text" width="50" class="form-control" id="nome" name="nome" placeholder="Nome do objeto">
          </div>
          <div class="mb-6" style="width: 40%;">
          <label for="campus">Campus</label>
          <select required name="campus" class="form-select" aria-label="Selecione o campus">
            <option selected value="Juazeiro do Norte">Juazeiro do Norte</option>
            <option value="Crato">Crato</option>
            <option value="Barbalha">Barbalha</option>
            <option value="Brejo Santo">Brejo Santo</option>
            <option value="Ico">Icó</option>
          </select>
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="descricao" class="form-label">Descrição</label>
            <input required type="text" width="50" class="form-control" id="descricao" name="descricao" placeholder="Características do objeto">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="formFileMultiple" class="form-label">Insira fotos do objeto</label>
            <input required class="form-control" type="file" name="fotos[]" id="formFileMultiple" multiple>
          </div>
          <br>
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