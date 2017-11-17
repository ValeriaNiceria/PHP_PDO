<?php

require_once("config.php");

$sql = new Sql();

$clientes = $sql->select("SELECT * FROM clientes");

//Retorna a representação JSON de um valor
echo json_encode($clientes);
?>