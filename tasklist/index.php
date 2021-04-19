<?php


const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "tasklist";


$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (isset($_POST["tarefa"])) {
    $tarefa = $_POST["tarefa"];
        $sqlTarefa = "INSERT INTO tbl_task (descricao) VALUES ('$tarefa')";
        mysqli_query($conexao, $sqlTarefa);
}

$sql = "SELECT * FROM tbl_task";

$resultado = mysqli_query($conexao, $sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="styles-global.css" />
</head>

<body>

    <div class="content">
        <h1>Lista de Tarefas</h1>
        <form method="POST">
            <div class="input-group">
                <label for="tarefa">Descrição da tarefa</label>
                <input type="text" name="tarefa" id="tarefa" placeholder="Digite a tarefa" required/>
            </div>
            <button>Adicionar</button>
        </form>
        <hr />
        <div class="tarefas">
            <?php
                while ($tarefa = mysqli_fetch_array($resultado)) {
            ?>
                <div class="tarefa">
                    <?=$tarefa["descricao"]?>
                    <span>&#128465;</span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

</body>

</html>