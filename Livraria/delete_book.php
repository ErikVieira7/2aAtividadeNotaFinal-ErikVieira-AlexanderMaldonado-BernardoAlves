<?php
include 'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->exec("DELETE FROM livros WHERE id = $id");
    header('Location: index.php');
}
