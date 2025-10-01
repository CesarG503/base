<?php 

namespace app\model;
use app\model\Database;
use PDO;

class estudiantes
{
    public $nombre;
    public $apellido;
    public $edad;
    public $grado;

    private $conn;
    private $table = 'estudiantes';

    public function __construct($conn)
    {
        $db = new Database();
        $this->conn = $db->getConnection();

    }

    //RED
    public function obtener()
    {
        $statement = $this->conn->prepare("SELECT * FROM {$this->table}");
    }


}

?>


