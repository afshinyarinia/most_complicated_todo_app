<?php
require_once 'DatabaseConnection.php';
require_once 'TodoItem.php';

$dbConnection = new DatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['task']) && !empty($data['task'])) {
        $task = $data['task'];

        $db = $dbConnection->getDb();
        TodoItem::create($db, $task);
        $dbConnection->closeConnection();
    } else {
        http_response_code(400);
        echo "Task data is missing or empty";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = $dbConnection->getDb();
    TodoItem::getAll($db);
    $dbConnection->closeConnection();
}
