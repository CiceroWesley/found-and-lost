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
  ?>
  <main>
    <section>
      <div class="text-center">
        <h3>Editar Objeto</h3>
      </div>
      <div>
        <form class="form-control formulario" action="../controller/editar_obj.php">
          <div class="mb-6" style="width: 40%;">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="email" width="50" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-6" style="width: 40%;">
            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
            <input type="email" width="50" class="form-control" id="exampleFormControlInput1" placeholder="">
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