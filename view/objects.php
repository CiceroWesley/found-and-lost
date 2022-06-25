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
      <div>
          <section>
              <div class="row">
                  <div class="text-center">
                      <h3>Objetos perdidos</h3>
                  </div>
              </div>
              <div class="row text-center">
                  <form action="objects.php" method="POST">
                      <label for="objeto">Pesquisar objeto</label>
                      <input type="text" name="objeto" required placeholder="Insira o nome do objeto" id="objeto">
                      <button type="submit">Pesquisar</button>
                  </form>
              </div>
          </section>
          <?php 
            include ('../model/db.php');
            
            if(!isset($_POST['objeto'])){
              $nome_objeto = '';
            } else{
              $nome_objeto = $_POST['objeto'];
            }

            if($nome_objeto != ''){
              //consulta realizada pelo like com o nome objeto
              $stmt = $con->prepare("SELECT * FROM Objeto WHERE Nome LIKE '%$nome_objeto%'");
              //$nome_objeto = "%" . $nome_objeto . "%";
              //$stmt->bind_param("s",$nome_objeto);
              $stmt->execute();
              $stmt->store_result();
              $linhas = $stmt->num_rows();
              //tabela descrições
              $stmt2 = $con->prepare("SELECT * FROM Descricoes");
              $result2 = $stmt2->execute();
              $stmt2->store_result();
              $linhas2 = $stmt2->num_rows();

              //echo '<h3>'."Linhas1:$linhas".'</h3>';
              //echo '<h3>'."Objeto:$nome_objeto".'</h3>';
              //echo '<h3>'."Linha2:$linhas2".'</h3>';

              if(($linhas > 0 && $linhas2 > 0)){
                $stmt->bind_result($id, $siape,$nome,$data,$devolvido);
                $stmt2->bind_result($id1,$fk_id_objeto,$campus,$descricao);
                $ids = [];
                //$siapes = [];
                $nomes = [];
                $datas = [];
                $devolvidos = [];
                $descricoes = [];
                //$campi = [];
                $fk_id_objetos = [];
                while($stmt->fetch()){
                  array_push($ids,$id);
                  //array_push($siapes,$siape);
                  array_push($nomes,$nome);
                  array_push($datas,$data);
                  array_push($devolvidos,$devolvido);
                }
                while($stmt2->fetch()){
                  array_push($fk_id_objetos,$fk_id_objeto);
                  //array_push($campi,$campus);
                  array_push($descricoes,$descricao);
                }
                while(count($ids) != count($fk_id_objetos)){
                  array_push($ids,-1);
                }
                //$conta1 = count($ids);
                //$conta2 = count($fk_id_objetos);
                $linhas = $linhas2;
                //echo '<h3>'."$conta1".'</h3>';
                //echo '<h3>'."$conta2".'</h3>';
                //print_r($ids);
                //print_r($fk_id_objetos);

              }
            } else{
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
              $stmt2->bind_result($id1,$fk_id_objeto,$campus,$descricao);
              $ids = [];
              //$siapes = [];
              $nomes = [];
              $datas = [];
              $devolvidos = [];
              $descricoes = [];
              //$campi = [];
              $fk_id_objetos = [];
              while($stmt->fetch()){
                array_push($ids,$id);
                //array_push($siapes,$siape);
                array_push($nomes,$nome);
                array_push($datas,$data);
                array_push($devolvidos,$devolvido);
              }
              while($stmt2->fetch()){
                array_push($fk_id_objetos,$fk_id_objeto);
                //array_push($campi,$campus);
                array_push($descricoes,$descricao);
              }
            }
          }
          
          
          //print_r($ids);
          //print_r($fk_id_objetos);
         echo "<section>";
         echo  "<div>";
         echo '<div class="row cards">';
          if(isset($ids)){
            for ($i=0; $i < $linhas; $i++) { 
              for($j=0; $j< $linhas; $j++){
                if($ids[$i] == $fk_id_objetos[$j] && $devolvidos[$i] != 1){
                  //echo 'I:'.$i;
                  //echo 'j:'.$j;
                echo '<div class="card" style="width: 12rem;">';
                echo '<img src="../public/icons/box.png" class="card-img-top" alt="...">';
                echo  '<div class="card-body">';
                        echo '<h5 class="card-title">'."$nomes[$i]".'</h5>';
                        echo '<p class="card-text">'."$descricoes[$j]".'</p>';
                        echo '<a href="#" class="btn btn-primary">Go somewhere</a>';
                      echo '</div>';
                  echo '</div>';
                }
              }
            }
          }
          echo '</div>'; 
          echo "</div>";
          echo "</section>"; 
          $stmt->close();  
          $stmt2->close();
          ?>
          
      </div>
  </main>
  <?php 
    include('footer.php');
  ?>
</body>
</html>