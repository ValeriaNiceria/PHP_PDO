<?php
$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","54321");

//Iniciando a transação
$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM clientes WHERE id_cliente = ?");

$id = 15;

$stmt->execute(array($id));

//Cancela a transação
//$conn->rollback();

//Confirma a transação
$conn->commit();

echo "Cliente $id, apagado com sucesso!";
?> 