<?php

include ("conexao.php");
include ("helpers.php");

//SQL para selecionar os registros
$sql = "SELECT * FROM tarefas";

//Seleciona os registros
$stmt = $conn->prepare($sql);
$stmt->execute();

//SQL para contar o total de registros
$sql_count = "SELECT COUNT(*) AS total FROM tarefas";

//Conta o total de registros
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

?>

<?php if ($total) : ?>

<table>

    <tr>
        <th>Tarefa</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluída</th>
        <th>Opções</th>
    </tr>

    <?php while ($tarefa = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?php echo $tarefa['tarefa_nome']; ?></td>
        <td><?php echo $tarefa['tarefa_descricao']; ?></td>
        <td><?php echo traduz_data_para_exibir($tarefa['tarefa_prazo']); ?></td>
        <td><?php echo traduz_prioridade($tarefa['tarefa_prioridade']); ?></td>
        <td><?php echo traduz_concluida($tarefa['tarefa_concluida']); ?></td>
        
        <td>
            <a href="formulario_edicao.php?tarefa_id=<?php echo $tarefa['tarefa_id']; ?>">Editar</a>
            <a href="deletar.php?tarefa_id=<?php echo $tarefa['tarefa_id']; ?>" onclick="return confirm('Tem certeza de que deseja remover a tarefa?')">Remover</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

<p class="total"> <strong>Total de tarefas:</strong> <?php echo $total; ?></p>

<?php else: ?>

<p class="aviso_registro">Nenhuma tarefa registrada.</p>

<?php endif; ?>


