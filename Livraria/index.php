<?php
require 'database.php';

// Buscar todos os livros
$stmt = $db->query("SELECT * FROM livros");
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Livraria</h1>
        <!-- Formulário para adicionar livros -->
        <h2>Adicionar Livro</h2>
        <form action="add_book.php" method="post">
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="number" name="ano" placeholder="Ano de Publicação" required>
            <button type="submit">Adicionar</button>
        </form>
        <!-- Lista de livros -->
        <h2>Livros Cadastrados</h2>
        <?php if (count($livros) > 0): ?>
            <ul class="book-list">
                <?php foreach ($livros as $livro): ?>
                    <li>
                        <?= htmlspecialchars($livro['titulo']) ?> 
                        (<?= htmlspecialchars($livro['autor']) ?>, <?= $livro['ano'] ?>)
                        <a href="delete_book.php?id=<?= $livro['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum livro cadastrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
