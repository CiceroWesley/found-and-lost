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
  ?>
  <main>
      <section>
          <div class="text-center">
              <h2>Devolver objeto</h2>
              <h4>Objeto: carregador</h4>
          </div>
          <div>
            <form class="form-control formulario" action="">
                <div class="mb-6" style="width: 40%;">
                  <label for="proprietario" class="form-label">Email do proprietário</label>
                  <input type="email" width="50" class="form-control" id="proprietario" placeholder="Insira o email do proprietário">
                </div>
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