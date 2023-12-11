<?php
//inclusão cabeçalho
include_once('header.php');
?>
<?php 
//inclusão cabeçalho
include_once('head.php');
?>
  <main>
      <section>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../public/images/bn0.gif" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../public/images/bn1.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../public/images/2.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
      </section>
      <section>
          <div class="row text-center">
            <h4>Objetos perdidos recentemente</h4>
          </div>
          <div class="row cards">
            <?php
              include ('../model/db.php');
              $stmt = $con->prepare("SELECT * FROM Objeto ORDER BY Id DESC");
              //$stmt->bind_param('isi',$_SESSION['siape'], $nome, $devolvido);
              $result = $stmt->execute();
              $stmt->store_result();
              $linhas = $stmt->num_rows;

              $stmt2 = $con->prepare("SELECT * FROM Descricoes ORDER BY Fk_id_objeto DESC");
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
              //print_r($ids);
              //print_r($fk_id_objetos);
              $count = 0;
              for($i=0 ; $i<$linhas; $i++){
                if($ids[$i] == $fk_id_objetos[$i] && $devolvidos[$i] != 1 && $count !=4){
                  //echo 'i:'.$i;
                  $stmt3 = $con->prepare("SELECT Foto FROM Fotos WHERE Fk_id_objeto = ?");
                  $stmt3->bind_param('i',$ids[$i]);
                  $result3 = $stmt3->execute();
                  $stmt3->store_result();
                  $linhas3 = $stmt3->num_rows();
                  $stmt3->bind_result($foto);
                  $stmt3->fetch();

                  echo '<div class="card" style="width: 12rem;">';
                  echo '<img src='."$foto".' class="card-img-top" alt="Imagem do objeto perdido">';
                  echo '<div class="card-body">';
                      echo '<h5 class="card-title">'.$nomes[$i].'</h5>';
                      echo '<p class="card-text">'.$descricoes[$i].'</p>';
                      echo '<a href='."verObjeto.php?id=$ids[$i]".' class="btn btn-primary">Ver objeto</a>';
                    echo '</div>';
                  echo '</div>';
                  $count +=1;
                }
              }
              ?>
          </div>
      </section>
  </main>
<?php 
//inclusão rodapé
include_once('footer.php');
?>