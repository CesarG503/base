<?php 

namespace app\model;
use PDO;

class Estudiantes{
    private $conn;
    private $tabla = 'estudiantes';

    public $nombre;
    public $apellido;
    public $edad;
    public $grado;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    //CREATE 
    public function create()
    {
        $sql = "INSERT INTO {$this->tabla} (nombre, apellido, edad, grado) VALUES (:nombre, :apellido, :edad, :grado)";
        $statement = $this->conn->prepare($sql);

        return $statement->execute([":nombre" => $this->nombre,":apellido" =>$this->apellido,":edad" => $this->edad, ":grado"=> $this->grado]); 
    }

    //RED 
    public function select()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    //DELETE 

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE id={$id}";
        $statement = $this->conn->prepare($sql);

        return $statement->execute();
    }


}

?>
