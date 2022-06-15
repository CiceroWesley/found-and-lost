<?php
  include ('../model/db.php');
  session_start();

  //verificação se os campos email e password estão preenchidos
  if(!isset($_POST['email'],$_POST['password'])){
    echo 'Os campos usuário e/ou senha estão vazios.';
    exit();
  }

  //verificando o usuário existe no banco de dados
 
  //preparação do SQL com seguro a SQL injection
  if($stmt = $con->prepare('SELECT * FROM Administrador WHERE Email=? AND Senha=? ')){
    //bind paramêtros
    $stmt->bind_param('ss',$_POST['email'], $_POST['password']);
    $stmt->execute();
    //armazena o resultado da consulta
    $stmt->store_result();
    //a consulta retornou alguma linha?
    if($stmt->num_rows > 0){
      //e se tiver mais de 1? [0}?
      //salvando resultado nas variaveis
      $stmt->bind_result($siape,$nome,$password,$email,$sexo,$nascimento);
      $stmt->fetch();

      //configurando sessão
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name']=$nome;
      $_SESSION['siape']=$siape;

      header('Location: ../view/objectsAdm.php');

    } else{
      echo 'Email e/ou senha não correspondem';
    }
    //fechando conexão
	  $stmt->close();
  }





?>