<?php

require_once("config.php");

//Carrega um Cliente, pelo Id informado
//$cliente = new Cliente();
//$cliente->loadById(18);
//echo $cliente;


//Lista todos os Clientes e por ter usado um método static não é necessário instanciar a classe
//$lista = Cliente::getList();
//echo json_encode($lista);


//Buscando Cliente pelo nome
//$busca = Cliente::search("m");
//echo json_encode($busca);


//Fazendo um login
//$cliente = new Cliente();
//$cliente->login("madalena@madalena.com","090909");
//echo ($cliente);


//Inserindo cliente no banco de dados
$cliente = new Cliente("Vinicios", "vinicios@vinicios.com", "(31)3333-3333", "333333", "2000-03-30");

$cliente->insert();

echo $cliente;

?>