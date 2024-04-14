<?php

class TodoItem
{
    public static function create($db, $task)
    {
        $stmt = $db->prepare('INSERT INTO todos (task) VALUES (:task)');
        $stmt->bindValue(':task', $task, SQLITE3_TEXT);
        $stmt->execute();
        echo "New record created successfully";
    }

    public static function getAll($db)
    {
        $result = $db->query('SELECT * FROM todos');
        $todos = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
    }
}
