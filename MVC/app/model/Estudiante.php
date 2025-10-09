<?php 


namespace app\model;
use PDO;
use lib\Database;

class Estudiante
{

    private $tabla = "estudiantes";
    private $conn;

    public $nombre;
    public $apellido;
    public $edad;
    public $grado;

    public function __construct($conn)
    {
        $db = new Database();
        $conn = $db->getConnetion();

        $this->conn = $conn;
    }



    //red 

    public function obtener()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $statement = $this->conn->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    //create 

    public function crear()
    {
        $sql = "INSERT INTO {$this->tabla} ";

    }

    //update


    //delete



    //select * id






}

?>
