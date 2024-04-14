<?php

namespace Models;

use SQLite3;
use Database\DatabaseConnection;
use Utils\Validator;
use Exceptions\ValidationException;

class TodoItem
{
    public static function create(DatabaseConnection $dbConnection, $task)
    {
        $db = $dbConnection->getDb();

        // Input Validation
        if (!Validator::validateTask($task)) {
            throw new ValidationException("Invalid task data");
        }

        $stmt = $db->prepare('INSERT INTO todos (task) VALUES (:task)');
        $stmt->bindValue(':task', $task, SQLITE3_TEXT);
        $stmt->execute();
        echo "New record created successfully";
    }

    public static function getAll(DatabaseConnection $dbConnection)
    {
        $db = $dbConnection->getDb();
        $result = $db->query('SELECT * FROM todos');
        $todos = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
    }
}
