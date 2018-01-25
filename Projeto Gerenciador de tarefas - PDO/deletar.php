<?php

include ("conexao.php");

//Pega o ID da URL
$id = isset($_GET['tarefa_id']) ? $_GET['tarefa_id'] : null;

//Valida o ID
if (empty($id)) {
    echo "ID não informado";
    die();
}

//Remove do banco
$sql = "DELETE FROM tarefas WHERE tarefa_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao remover.";
    print_r($stmt->errorInfo());
}