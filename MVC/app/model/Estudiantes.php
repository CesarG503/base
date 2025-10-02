<?php 

namespace app\model;
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
        $this->conn = $conn;
    }

    //RED
    public function obtener()
    {
        $statement = $this->conn->query("SELECT * FROM {$this->table}"); // query es como prepare y excecute
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //select 1 
    public function selectId($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);

    }


    // CREATE
    public function create()
    {
        $sql = "INSERT INTO {$this->table} (nombre,apellido,edad,grado) VALUES (?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        return $statement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado]); // ingresamos los datos directamente en el execute
    }

    //DELETE
    public function borrar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stetement = $this->conn->prepare($sql);
        return $stetement->execute([$id]);
    }

    //UPDATE
    public function actualizar($id)
    {
        $sql = "UPDATE {$this->table} SET nombre = ?, apellido = ?, edad = ?, grado = ? WHERE id = ?";

        $stetement = $this->conn->prepare($sql);

        return $stetement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado,$id]);
    }



}

?>


