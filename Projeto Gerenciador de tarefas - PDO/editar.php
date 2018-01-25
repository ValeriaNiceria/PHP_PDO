<?php

include ("conexao.php");

//Resgata os valores do formulário
$tarefa_nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$tarefa_descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$tarefa_prazo = isset($_POST['prazo']) ? $_POST['prazo'] : null;
$tarefa_prioridade = isset($_POST['prioridade']) ? $_POST['prioridade'] : null;
$tarefa_concluida = isset($_POST['concluida']) ? $_POST['concluida'] : '0';
$tarefa_id = isset($_POST['tarefa_id']) ? $_POST['tarefa_id'] : null;

//Atualiza o banco
$sql = "UPDATE tarefas SET tarefa_nome = :nome, tarefa_descricao = :descricao, tarefa_prazo = :prazo, tarefa_prioridade = :prioridade, tarefa_concluida = :concluida WHERE tarefa_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":nome", $tarefa_nome);
$stmt->bindParam(":descricao", $tarefa_descricao);
$stmt->bindParam(":prazo", $tarefa_prazo);
$stmt->bindParam(":prioridade", $tarefa_prioridade);
$stmt->bindParam(":concluida", $tarefa_concluida);
$stmt->bindParam(":id", $tarefa_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
    die();
} else {
    echo "Erro ao alterar.";
    print_r($stmt->errorInfo());
}
