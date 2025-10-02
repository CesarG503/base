<?php

namespace app\model;
use PDO;
use PDOException;

class Database{

    public $host = "db";
    public $dbname = "estudiantes";
    public $username = "root";
    public $password = "rootpass";

    public $conn;

    public function getConnetion(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname , $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo $th;
        }
        return $this->conn;
    }
}

?>
