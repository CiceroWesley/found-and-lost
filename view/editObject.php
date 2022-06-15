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
        <h5>Objeto: Carregador</h5>
      </div>
      <div>
        <form class="form-control formulario" action="">
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
            <select name="Campus" id="campus">
              <option value="Juazeiro do Norte">Juazeiro do Norte</option>
              <option value="Barbalha"> Barbalha</option>
              <option value="Crato">Crato</option>
              <option value="Brejo Santo">Brejo Santo</option>
              <option value="Icó">Icó</option>
            </select> 
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