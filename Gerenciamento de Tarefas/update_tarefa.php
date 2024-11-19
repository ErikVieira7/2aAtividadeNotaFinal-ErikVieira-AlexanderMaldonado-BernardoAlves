<?php
include 'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->exec("UPDATE tarefas SET concluida = 1 WHERE id = $id");
    header('Location: index.php');
}
