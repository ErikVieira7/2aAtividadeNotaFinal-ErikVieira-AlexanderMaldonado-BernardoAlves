<?php
$db = new SQLite3('tarefas.db');
$db->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    descricao TEXT,
    data_vencimento DATE,
    concluida INTEGER DEFAULT 0
)");
