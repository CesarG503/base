<?php 

namespace app\model;
use PDO;
use app\model\Database;


class Estudiante
{
    public $tabla = "";
    private $conn;

    public $nombre;
    public $apellido;
    public $edad;
    public $grado;


    public function __construct()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $this->conn = $conn;
    }


    public function obtener()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $statement = $this->conn->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear()
    {
        $sql = "INSERT INTO {$this->tabla} (nombre,apellido,edad,grado) VALUES (?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        return $statement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado]);
    }

    public function borrar($id)
    {
        $sql = "DELETE {$this->tabla} WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        return $statement->execute([$id]);
    }

    public function update($id)
    {
        $sql = "UPDATE {$this->tabla} SET nombre = ?,apellido = ? ,edad = ?,grado = ? WHERE id = ? ";
        $statement = $this->conn->prepare($sql);
        return $statement->execute([$this->nombre,$this->apellido,$this->edad,$this->grado, $id]);

    }

    public function select($id)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = ?";
        $statement = $this->conn->prepare($sql);

        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function busqueda($busqueda)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE nombre LIKE ? OR apellido LIKE ? OR edad LIKE ? OR grado LIKE ?";

        $statement = $this->conn->prepare($sql);

        $statement->execute(["%$busqueda%","%$busqueda%","%$busqueda%","%$busqueda%" ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
