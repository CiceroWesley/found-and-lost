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
                  <form action="">
                      <label for="objeto">Pesquisar objeto</label>
                      <input type="text" name="objeto" placeholder="Insira o nome do objeto" id="objeto">
                      <button type="submit">Pesquisar</button>
                  </form>
              </div>
          </section>
          <section>
            <div>
              <div class="row cards">
                <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                  <div class="card" style="width: 12rem;">
                    <img src="../public/icons/box.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div> 
            </div>
            </div>
          </section>
      </div>
  </main>
  <?php 
    include('footer.php');
  ?>
</body>
</html>