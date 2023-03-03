<?php

class Database
{
    private
        $dbhost = DBHost,
        $dbuser = DBUser,
        $dbpass = DBPass,
        $dbname = DBName;

    private
        $dbh,
        $stmt;

    public function __construct()
    {
        // data source name
        $dsn = "mysql:host={$this->dbhost};dbname={$this->dbname}";

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, "{$this->dbuser}", "{$this->dbpass}", $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function filter($data)
    {
        $data = stripslashes(htmlspecialchars($data));
        return $data;
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
