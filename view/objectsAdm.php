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
      include ('headerAdm.php');
      session_start();
      // If the user is not logged in redirect to the login page...
      if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
      }
  ?>
  
  <main>
    <section>
      <div class="row text-center">
          <div class="col-8">
              <h3>Objetos cadastrados</h3>
          </div>
          <div class="col-4" style="margin-top: 5px;">
              <a href="cadastro.html"><button class="btn btn-success">Cadastrar Objeto</button></a>
          </div>
      </div>
      <div class="text-center">
          <table class="table table-sm">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Data cadastro</th>
                      <th>Data devolvido</th>
                      <th>Editar</th>
                      <th>Remover</th>
                      <th>Devolver</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Carregador</td>
                      <td>02/06/2022</td>
                      <td>04/06/2022</td>
                      <td><a href=""><button class="btn btn-warning">Editar</button></a></td>
                      <td><a href=""><button class="btn btn-danger">Remover</button></a></td>
                      <td><a href=""><button class="btn btn-success">Devolver</button></a></td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>Carregador</td>
                      <td>02/06/2022</td>
                      <td>04/06/2022</td>
                      <td><a href=""><button class="btn btn-warning">Editar</button></a></td>
                      <td><a href=""><button class="btn btn-danger">Remover</button></a></td>
                      <td><a href=""><button class="btn btn-success">Devolver</button></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Carregador</td>
                      <td>02/06/2022</td>
                      <td>04/06/2022</td>
                      <td><a href=""><button class="btn btn-warning">Editar</button></a></td>
                      <td><a href=""><button class="btn btn-danger">Remover</button></a></td>
                      <td><a href=""><button class="btn btn-success">Devolver</button></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Carregador</td>
                      <td>02/06/2022</td>
                      <td>04/06/2022</td>
                      <td><a href=""><button class="btn btn-warning">Editar</button></a></td>
                      <td><a href=""><button class="btn btn-danger">Remover</button></a></td>
                      <td><a href=""><button class="btn btn-success">Devolver</button></a></td>
                    </tr>
              </tbody>
          </table>
      </div>
    </section>
  </main>
  <?php 
    //inclusão rodape
    include('footer.php');
  ?>
</body>
</html>