<?php

require_once '../vendor/autoload.php'; // Autoload classes using Composer

use Database\DatabaseConnection;
use Models\TodoItem;
use Utils\Logger;
use Exceptions\ValidationException;

// Create SQLite database connection
$db = new SQLite3('todo_app.db');
$dbConnection = new DatabaseConnection($db);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['task']) && !empty($data['task'])) {
            $task = $data['task'];

            TodoItem::create($dbConnection, $task);
        } else {
            http_response_code(400);
            echo "Task data is missing or empty";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        TodoItem::getAll($dbConnection);
    }
} catch (ValidationException $e) {
    http_response_code(400);
    echo "Validation Error: " . $e->getMessage();
} catch (Exception $e) {
    http_response_code(500);
    echo "An error occurred: " . $e->getMessage();
} finally {
    $dbConnection->closeConnection();
}
