<?php

namespace Database;

use SQLite3;

class DatabaseConnection
{
    private $db;

    public function __construct(SQLite3 $db)
    {
        $this->db = $db;
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
