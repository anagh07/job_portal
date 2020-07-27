<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $conn;
    private $error;
    private $statement;

    public function __construct() {
        // Build the connection string
        $conn_string = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        // Connection using PDO
        try {
            $this->conn = new PDO($conn_string, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_PERSISTENT, true);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query) {
        $this->statement = $this->conn->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch (true) {
                case is_int($value) :
                    # code...
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value) :
                    # code...
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value) :
                    # code...
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    # code...
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->statement->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
}