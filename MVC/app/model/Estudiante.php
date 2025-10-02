<?php 
namespace app\model;
use PDO;
use app\model\Database;
class Estudiante{

    private $tabla = 'estudiantes';
    private $conn;

    public $nombre;
    public $apellido;
    public $edad;
    public $grado;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function obtener()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $statement = $this->conn->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscar($id)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = ?";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $sql = "INSERT INTO {$this->tabla} (nombre,apellido,edad,grado) VALUES (?,?,?,?)";

        $statement = $this->conn->prepare($sql);

        return $statement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado]);

    }

    public function borrar($id)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        return $statement->execute([$id]);
    }


     public function update($id)
    {
        $sql = "UPDATE {$this->tabla} SET nombre = ?,apellido = ? ,edad = ? ,grado = ? WHERE id = ?";

        $statement = $this->conn->prepare($sql);

        return $statement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado, $id]);

    }

}
?>
