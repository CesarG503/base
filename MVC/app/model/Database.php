<?php 

namespace app\model;
use PDO;

class Database
{
    private $host = 'db';
    private $dbname = 'estudiantes';
    private $user = 'root';
    private $password = 'rootpass';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user,$this->password);
            $this->conn->exec('set names utf8');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (\Throwable $th) 
        {
        echo $th;
        }
        return $this->conn;
        
    }
}
?>
