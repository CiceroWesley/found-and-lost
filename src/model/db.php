<?php
$DATABASE_HOST = 'db';
$DATABASE_USER = 'user1';
$DATABASE_PASS = 'password1';
$DATABASE_NAME = 'bessapontes25';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_errno()){
  echo 'Erro na conexão com o banco de dados' . mysqli_connect_error();
} else{
  //echo 'sucesso na conexão';
}
?>
