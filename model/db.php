
<?php
$DATABASE_HOST = 'mysql.bessapontes.com.br';
$DATABASE_USER = 'bessapontes25';
$DATABASE_PASS = '3banco3';
$DATABASE_NAME = 'bessapontes25';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_errno()){
  echo 'Erro na conexão com o banco de dados' . mysqli_connect_error();
} else{
  //echo 'sucesso na conexão';
}
?>
