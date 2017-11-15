<?php
//Conexao com o banco de dados
$conn = new PDO("mysql:dbname=cadastro;host=localhost", "root", "54321");

$stmt = $conn->prepare("INSERT INTO clientes (nome_cliente, email_cliente, telefone_cliente, senha_cliente, data_nasc_cliente) VALUE
(:NOME, :EMAIL, :TELEFONE, :SENHA, :DATA_NASC)");

$nome = "Aparecida";
$email = "aparecida@aparecida.com";
$telefone = "(33)3333-3333";
$senha = "333333";
$dataNasc = "1990-10-10";

$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":EMAIL", $email);
$stmt->bindParam(":TELEFONE", $telefone);
$stmt->bindParam(":SENHA", $senha);
$stmt->bindParam(":DATA_NASC", $dataNasc);

$stmt->execute();

echo "Cliente $nome, cadastrado(a) com sucesso!";
?>