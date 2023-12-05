<?php
    session_start();
    $logado = isset($_SESSION['loggedin']);
    if($logado == TRUE){
        $href = 'logout.php';
    } else{
        $href = 'telaLogin.html';
    }

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }
?>
    <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
    <img src="../public/icons/lg.png" width="5%" alt="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="objectsAdm.php">Objetos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#footer">Sobre</a>
        </li>
    </ul>
    </div>
    <div>
    <a class='navbar-brand' href='<?php echo $href; ?>'><i class="bi bi-box-arrow-left"></i> Sair</a>
    </div>
    </div>
    </nav>