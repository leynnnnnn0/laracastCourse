<?php

// Connect to our MySQL database
// dsn = data source name 
class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $dbUsername = "root", $dbPassword = "") {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        try {
            $this->connection = new PDO(
                $dsn, 
                $dbUsername, 
                $dbPassword,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {
            echo "CONNECTION FAILED";
            echo "Error: " . $e->getMessage() . "";
        }
    }
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if(!$result){
            abort(Response::FORBIDDEN);
        }
        return $result;
    }
}