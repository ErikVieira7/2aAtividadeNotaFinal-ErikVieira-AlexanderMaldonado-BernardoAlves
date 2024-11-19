<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tarefas</title>
    <meta charset="UTF-8">
    <style>
        body { margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid black; padding: 5px; }
        .concluida { background-color: #e0e0e0; text-decoration: line-through; }
    </style>
</head>
<body>
    <h2>Nova Tarefa</h2>
    <form action="add_tarefa.php" method="POST">
        Descrição: <input type="text" name="descricao" required><br><br>
        Data: <input type="date" name="data" required><br><br>
        <input type="submit" value="Adicionar">
    </form>

    <h2>Tarefas Pendentes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php
        $pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento");
        while ($t = $pendentes->fetchArray()) {
            echo "<tr>";
            echo "<td>" . $t['id'] . "</td>";
            echo "<td>" . $t['descricao'] . "</td>";
            echo "<td>" . $t['data_vencimento'] . "</td>";
            echo "<td>
                    <a href='update_tarefa.php?id=" . $t['id'] . "'>Concluir</a> | 
                    <a href='delete_tarefa.php?id=" . $t['id'] . "'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Tarefas Concluídas</h2>
    <table>
        <?php
        $concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento");
        while ($t = $concluidas->fetchArray()) {
            echo "<tr class='concluida'>";
            echo "<td>" . $t['id'] . "</td>";
            echo "<td>" . $t['descricao'] . "</td>";
            echo "<td>" . $t['data_vencimento'] . "</td>";
            echo "<td><a href='delete_tarefa.php?id=" . $t['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
