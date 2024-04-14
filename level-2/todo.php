<?php

function createDatabaseConnection()
{
    try {
        $db = new SQLite3('todo_app.db');
        $db->exec('CREATE TABLE IF NOT EXISTS todos (id INTEGER PRIMARY KEY, task TEXT)');
        return $db;
    } catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }
}

function createTodoItem($db, $task)
{
    try {
        $stmt = $db->prepare('INSERT INTO todos (task) VALUES (:task)');
        $stmt->bindValue(':task', $task, SQLITE3_TEXT);
        $stmt->execute();
        echo "New record created successfully";
    } catch (Exception $e) {
        die("Error creating todo item: " . $e->getMessage());
    }
}

function getAllTodoItems($db)
{
    try {
        $result = $db->query('SELECT * FROM todos');
        $todos = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
    } catch (Exception $e) {
        die("Error fetching todo items: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['task']) && !empty($data['task'])) {
        $task = $data['task'];

        $db = createDatabaseConnection();
        createTodoItem($db, $task);
        $db->close();
    } else {
        http_response_code(400);
        echo "Task data is missing or empty";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = createDatabaseConnection();
    getAllTodoItems($db);
    $db->close();
}
