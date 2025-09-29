<?php 
namespace app\model;
use PDO;

class Database{
    private $host ='db'; 
    private $db_name = 'estudiantes';
    private $username = 'root';
    private $password = 'rootpass';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};",$this->username,$this->password);
            $this->conn->exec('set names utf8');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th)
        {
            echo "CONECCION FALLIDA {$th}";
            
        }
        return $this->conn;
    }
}
?>