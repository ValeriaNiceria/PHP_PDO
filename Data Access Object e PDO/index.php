<?php

require_once("config.php");

$cliente = new Cliente();

$cliente->loadById(18);

echo $cliente;

?>