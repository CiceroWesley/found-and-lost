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
      //session_start();
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
              <a href="cadastro.php"><button class="btn btn-primary">Cadastrar Objeto</button></a>
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
                <?php
                  include ('../model/db.php');
                  $stmt = $con->prepare("SELECT * FROM Objeto");
                  //$stmt->bind_param('isi',$_SESSION['siape'], $nome, $devolvido);
                  $result = $stmt->execute();
                  $stmt->store_result();
                  $linhas = $stmt->num_rows;
                  if($linhas > 0){
                    //e se tiver mais de 1? [0}?
                    //salvando resultado nas variaveis
                    $stmt->bind_result($id, $siape,$nome,$data,$devolvido);
                    $ids = [];
                    $siapes = [];
                    $nomes = [];
                    $datas = [];
                    $devolvidos = [];
                    while($stmt->fetch()){
                      array_push($ids,$id);
                      array_push($siapes,$siape);
                      array_push($nomes,$nome);
                      array_push($datas,$data);
                      array_push($devolvidos,$devolvido);
                    }
                    for ($i=0; $i < $linhas; $i++) { 
                      echo '<tr>';
                      echo "<td>$ids[$i]</td>";
                      echo "<td>$nomes[$i]</td>";
                      echo "<td>$datas[$i]</td>";
                      if($devolvidos[$i]){
                        echo "<td>VER pelo banco</td>";
                      } else{
                        echo "<td>Não devolvido</td>";
                      }
                      echo '<td><a href='."editObject.php?id=$ids[$i]".'><button class="btn btn-warning">Editar</button></a></td>';
                      echo '<td><a href="'."../controller/remover_obj.php?id=$ids[$i]".'"><button class="btn btn-danger">Remover</button></a></td>';
                      echo '<td><a href="'."devolver.php?id=$ids[$i]".'"><button class="btn btn-success">Devolver</button></a></td>';
                      echo '</tr>';
                    }
                  }
                  $stmt->close();  
                  ?>
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