<?php

include("conexao.php");

//SQL para selecionar os registros
$sql = "SELECT * FROM tarefas";

//Seleciona os registros
$stmt = $conn->prepare($sql);
$stmt->execute();

?>

<table>

    <tr>
        <th>Tarefa</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluída</th>
    </tr>

    <?php while ($tarefa = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?php echo $tarefa['tarefa_nome']; ?></td>
        <td><?php echo $tarefa['tarefa_descricao']; ?></td>
        <td><?php echo $tarefa['tarefa_prazo']; ?></td>
        <td><?php echo $tarefa['tarefa_prioridade']; ?></td>
        <td><?php echo $tarefa['tarefa_concluida']; ?></td>
    </tr>
    <?php endwhile; ?>

</table>
