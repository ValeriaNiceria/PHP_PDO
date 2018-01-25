<?php

include ('conexao.php');

//Pega o ID da URL
$id = isset($_GET['tarefa_id']) ? (int) $_GET['tarefa_id'] : null;

//Valida o ID
if (empty($id)) {
    echo "ID para alteração não definido.";
    die();
}

//Busca os dados do usuário a ser editado
$sql = "SELECT * FROM tarefas WHERE tarefa_id = :tarefa_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':tarefa_id', $id, PDO::PARAM_INT);

$stmt->execute();

$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

//Se o método fetch() não retornar um array, significa que o ID não corresponde a uma tarefa válida
if (!is_array($tarefa)) {
    echo "Nenhum usuário encontrado.";
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Edição da tarefa</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

    <h1>Edição da tarefa</h1>

    <form action="editar.php" method="POST">
        <fieldset>
            <legend>Edição tarefa</legend>

            <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['tarefa_id']; ?>">

            <label for="nome">Tarefa</label>
            <input type="text" name="nome" value="<?php echo $tarefa['tarefa_nome']; ?>"/>

            <label for="descricao">Descrição</label>
            <textarea name="descricao"><?php echo $tarefa['tarefa_descricao']; ?></textarea>

            <label for="prazo">Prazo</label>
            <input type="date" name="prazo" value="<?php echo $tarefa['tarefa_prazo']; ?>"/>

            <fieldset>
                <legend>Prioridade</legend>
                    <input type="radio" name="prioridade" value="1" 
                    <?php echo ($tarefa['tarefa_prioridade'] === 1) ? 'checked' : ''; ?> /> 
                    Baixa
                    <input type="radio" name="prioridade" value="2"
                    <?php echo ($tarefa['tarefa_prioridade'] == 2) ? 'checked' : ''; ?>/> 
                    Média
                    <input type="radio" name="prioridade" value="3"
                    <?php echo ($tarefa['tarefa_prioridade'] == 3) ? 'checked' : ''; ?>/> 
                    Alta
            </fieldset>

            <label for="concluida">Concluída</label>
            <input type="checkbox" name="concluida" value="1"
            <?php echo ($tarefa['tarefa_concluida'] == 1) ? 'checked' : ''; ?>/>

            <!--Botão para cancelar a edição-->
            <a href="cancela.php" class="cancelar">Cancelar Edição</a>
            
            <input type="submit" value="Atualizar"/>
        </fieldset>
    </form>
    
</body>
</html>