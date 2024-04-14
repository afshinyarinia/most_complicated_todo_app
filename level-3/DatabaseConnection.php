<?php

class DatabaseConnection
{
    private $db;

    public function __construct()
    {
        $this->db = new SQLite3('todo_app.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS todos (id INTEGER PRIMARY KEY, task TEXT)');
    }

    public function getDb()
    {
        return $this->db;
    }

    public function closeConnection()
    {
        $this->db->close();
    }
}
