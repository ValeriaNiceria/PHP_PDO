<?php 

include ('config.php');

//Conecta com o MySQL usando o PDO
$conn = new PDO('mysql:dbname=' . BD_BANCO . ';host=' . BD_SERVIDOR, BD_USUARIO, BD_SENHA);
