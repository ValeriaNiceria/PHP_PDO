<?php 

include ('config.php');

//Conecta com o MySQL usando o PDO
$conn = new PDO('mysql:dbname=' . BD_BANCO . ';host=' . BD_SERVIDOR, BD_USUARIO, BD_SENHA);

//Selecionando os registros
$stmt = $conn->prepare("SELECT * FROM tarefas ORDER BY tarefa_id");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Listando os registros localizados
foreach($results as $result) :
    foreach($result as $key => $value) :
        echo '<strong>' . $key . '</strong>' . ': ' . $value . '<br/>';
    endforeach;
endforeach;