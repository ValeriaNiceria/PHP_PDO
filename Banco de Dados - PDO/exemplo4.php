<?php
$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","54321");

//Prepara uma declaração para execução e retorna um objeto de declaração
$stmt = $conn->prepare("DELETE FROM clientes WHERE id_cliente = :ID");

$id = 14;

//Vincula um parâmetro ao nome da variável especificada
$stmt->bindParam("ID", $id);

//Executa o comando
$stmt->execute();

echo "Cliente com id $id apagado com sucesso!";
?>