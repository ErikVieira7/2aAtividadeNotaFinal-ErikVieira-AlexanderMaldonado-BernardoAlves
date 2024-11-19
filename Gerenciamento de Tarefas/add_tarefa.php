<?php
include 'database.php';
if ($_POST) {
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $db->exec("INSERT INTO tarefas (descricao, data_vencimento) VALUES ('$descricao', '$data')");
    header('Location: index.php');
}
