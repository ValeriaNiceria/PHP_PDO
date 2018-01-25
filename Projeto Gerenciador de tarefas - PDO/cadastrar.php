<?php

include ('conexao.php');

$sql = "INSERT INTO tarefas (tarefa_nome, tarefa_descricao, tarefa_prazo, tarefa_prioridade, tarefa_concluida) 
    VALUES (:nome_tarefa, :descricao_tarefa, :prazo_tarefa, :prioridade_tarefa, :concluida_tarefa)";

//Pega os dados do formulário
$nome_tarefa =  isset($_POST['nome']) ? $_POST['nome'] : null;
$descricao_tarefa = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$prazo_tarefa = isset($_POST['prazo']) ? $_POST['prazo'] : null;
$prioridade_tarefa = isset($_POST['prioridade']) ? $_POST['prioridade'] : null;
$concluida_tarefa = isset($_POST['concluida']) ? $_POST['concluida'] : '0';

//Inserir no banco de dados
$stmt = $conn->prepare($sql);
$stmt->bindParam(":nome_tarefa", $nome_tarefa);
$stmt->bindParam(":descricao_tarefa", $descricao_tarefa);
$stmt->bindParam(":prazo_tarefa", $prazo_tarefa);
$stmt->bindParam(":prioridade_tarefa", $prioridade_tarefa);
$stmt->bindParam(":concluida_tarefa", $concluida_tarefa);

if ($stmt->execute()) {
    header('Location: index.php');
    die();
}