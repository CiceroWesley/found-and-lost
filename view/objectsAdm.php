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
                      <th>Email do proprietario</th>
                      <th>Descrição</th>
                      <th>Campus</th>
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

                  $stmt2 = $con->prepare("SELECT * FROM Descricoes");
                  $result2 = $stmt2->execute();
                  $stmt2->store_result();
                  $linhas2 = $stmt2->num_rows();

                  if(($linhas > 0 && $linhas2 > 0) && ($linhas == $linhas2)){
                    //e se tiver mais de 1? [0}?
                    //salvando resultado nas variaveis
                    $stmt->bind_result($id, $siape,$nome,$data,$devolvido);
                    $stmt2->bind_result($id,$fk_id_objeto,$campus,$descricao);
                    $ids = [];
                    $siapes = [];
                    $nomes = [];
                    $datas = [];
                    $devolvidos = [];
                    $descricoes = [];
                    $campi = [];
                    $fk_id_objetos = [];
                    while($stmt->fetch()){
                      array_push($ids,$id);
                      array_push($siapes,$siape);
                      array_push($nomes,$nome);
                      array_push($datas,$data);
                      array_push($devolvidos,$devolvido);
                    }
                    while($stmt2->fetch()){
                      array_push($fk_id_objetos,$fk_id_objeto);
                      array_push($campi,$campus);
                      array_push($descricoes,$descricao);
                    }

                    //print_r($ids);
                    //print_r(($fk_id_objetos));
                    for ($i=0; $i < $linhas; $i++) { 
                      echo '<tr>';
                      // verificação, pois alguem pode inserir algo diretamente no banco
                      // com a verificação o objeto so aparece se os ids baterem
                      if($ids[$i] == $fk_id_objetos[$i]){
                        //echo 'i:'.$i;
                        echo "<td>$ids[$i]</td>";
                        echo "<td>$nomes[$i]</td>";
                        echo "<td>$datas[$i]</td>";
                        if($devolvidos[$i]){
                          $stmt4 = $con->prepare("SELECT Email_proprietario, Data_devolvido FROM Devolvidos WHERE Fk_id_objeto =?");
                          $stmt4->bind_param('i',$ids[$i]);
                          $result4 = $stmt4->execute();
                          $stmt4->store_result();
                          $linhas4 = $stmt4->num_rows;
                          $stmt4->bind_result($email_proprietario,$data_devolvido);
                          $stmt4->fetch();

                          echo "<td>$data_devolvido</td>";
                          echo "<td>$email_proprietario</td>";
                        } else{
                          echo "<td>Objeto não devolvido</td>";
                          echo "<td>Objeto não devolvido</td>";
                        }
                        echo "<td>$descricoes[$i]</td>";
                        echo "<td>$campi[$i]</td>";
                        echo '<td><a href='."editObject.php?id=$ids[$i]".'><button class="btn btn-warning">Editar</button></a></td>';
                        echo '<td><a href="'."../controller/remover_obj.php?id=$ids[$i]".'"><button class="btn btn-danger">Remover</button></a></td>';
                        echo '<td><a href="'."devolver.php?id=$ids[$i]".'"><button class="btn btn-success">Devolver</button></a></td>';
                        echo '</tr>';
                      }
                    }
                  }
                  $stmt->close();  
                  $stmt2->close();
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