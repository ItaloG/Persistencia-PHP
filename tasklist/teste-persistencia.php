<?php

// Hoje em dia, no PHP, temos duas maneiras principais de manipular banco de dados

// São eles mysqli e o PDO

// Utilizaremos nessa aula o mysql

// Precisamos então fazer a conexão com o MySQL

const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "tasklist";

// fazendo a conexão com o mysql
$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$sql = "SELECT * FROM tbl_task";

$resultado = mysqli_query($conexao, $sql);

$tarefa = "Minha nova tarefa";

$sqlInsert = "INSERT INTO tbl_task (descricao) VALUES ('$tarefa')";

mysqli_query($conexao, $sqlInsert)

// $linha1 = mysqli_fetch_array($resultado);

// print_r($linha1);

// echo("<br/><br/>");

// $linha2 = mysqli_fetch_array($resultado);

// print_r($linha2);

// echo("<br/><br/>");

// $linha3 = mysqli_fetch_array($resultado);

// print_r($linha3);

// echo("<br/><br/>");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
                <th>ID</th>
                <th>DESCRIÇÂO</th>
        </tr>
        <?php
            while ($linha = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?=$linha["id"]?></td>
            <td><?= $linha["descricao"]?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>