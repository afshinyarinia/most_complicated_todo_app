<?php

// Create SQLite database
$db = new SQLite3('todo_app.db');

// Create todos table
$db->exec('CREATE TABLE IF NOT EXISTS todos (id INTEGER PRIMARY KEY, task TEXT)');

// Create a new todo item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $task = $data['task'];

    $stmt = $db->prepare('INSERT INTO todos (task) VALUES (:task)');
    $stmt->bindValue(':task', $task, SQLITE3_TEXT);
    $stmt->execute();

    echo "New record created successfully";
}

// Get all todo items
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $db->query('SELECT * FROM todos');

    $todos = array();
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $todos[] = $row;
    }

    echo json_encode($todos);
}

// Close database connection
$db->close();
