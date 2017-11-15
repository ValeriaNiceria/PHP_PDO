<pre>
<?php

//Conectando ao banco de dados
$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","54321");

//Prepara uma consulta para execução
$stmt = $conn->prepare("SELECT * FROM clientes ORDER BY id_cliente");

//Executa uma preparada query
$stmt->execute();

//Retorna uma matriz contendo todas as linhas
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    foreach($row as $key => $value){
        echo  "<strong> $key : </strong> ". $value . "<br/>";
    }
    echo "**********************<br/>";
}

print_r($results);

?>
</pre>