<?php

$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","54321");

$stmt = $conn->prepare("UPDATE clientes SET nome_cliente = :NOME, email_cliente = :EMAIL, telefone_cliente = :TELEFONE, senha_cliente = :SENHA, data_nasc_cliente = :DATA_NASC WHERE id_cliente = :ID");

$nome = "Madalena";
$email = "madalena@madalena.com";
$telefone = "(00)0000-0000";
$senha = "00000";
$dataNasc = "2000-10-10";
$id = "14";

$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":EMAIL", $email);
$stmt->bindParam(":TELEFONE", $telefone);
$stmt->bindParam(":SENHA", $senha);
$stmt->bindParam(":DATA_NASC", $dataNasc);
$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Cliente de id $id alterado com sucesso!"; 
?>