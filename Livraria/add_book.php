<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    if ($titulo && $autor && $ano) {
        $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (:titulo, :autor, :ano)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->execute();
    }
}
header('Location: index.php');
exit;
