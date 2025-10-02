<?php 

namespace app\controller;
use app\model\Database;
use app\model\Estudiante;

class IndexController
{
    public function view($view, $data =[])
    {
        extract($data);

        if(file_exists("../app/views/$view.php"))
            {
                ob_start();
                include("../app/views/$view.php");
                $content = ob_get_clean();
                return $content;
            }
        else{
            echo "NO existe ese archivo";
        }

    }

    public function Index()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiante($conn);

        $estudiantes = $estudiante->obtener();

        return $this->view('index',["title" => 'INCIO', 'estudiantes'=> $estudiantes]);
    }

    public function Borrar()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiante($conn);

        $estudiante->borrar($_POST['id']);

        $estudiantes = $estudiante->obtener();

        return $this->view('index',["title" => 'INCIO', 'estudiantes'=> $estudiantes]);

    }

    public function Crear()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiante($conn);

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $grado = $_POST['grado'];


        if(empty($nombre) || empty($apellido) || empty($edad) || empty($grado) )
            {
                $estudiantes = $estudiante->obtener();
                return $this->view('index', ["title" => "INCIO", "estudiantes" => $estudiantes, "error" => 'Todos los campos son obligatorios']);

            }
        else{

            $estudiante->nombre = $nombre;
            $estudiante->apellido = $apellido;
            $estudiante->edad = $edad;
            $estudiante->grado = $grado;

            $estudiante->create();
            $estudiantes = $estudiante->obtener();

            return $this->view('index', ["title" => "INCIO", "estudiantes" => $estudiantes, "exito" => 'Se creo correctamente']);

        }

    }

    public function Editar()
    {
        $id = $_POST['id'];
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiante($conn);

        $seleccion = $estudiante->buscar($id);
        $estudiantes = $estudiante->obtener();

        return $this->view('index', ["title" => "INCIO", "estudiantes" => $estudiantes, "exito" => 'Se creo correctamente', "estudiante" => $seleccion, "id" => $id]);

    }

    public function Actualizar()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiante($conn);

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $grado = $_POST['grado'];


        if(empty($nombre) || empty($apellido) || empty($edad) || empty($grado) )
            {
                $estudiantes = $estudiante->obtener();
                return $this->view('index', ["title" => "INCIO", "estudiantes" => $estudiantes, "error" => 'Todos los campos son obligatorios']);

            }
        else{

            if($_POST['accion'] === "ACEPTAR")
                {
                    $estudiante->nombre = $nombre;
                    $estudiante->apellido = $apellido;
                    $estudiante->edad = $edad;
                    $estudiante->grado = $grado;

                    $estudiante->update((int)$_POST['id']);
                    $estudiantes = $estudiante->obtener();

                    return $this->view('index', ["title" => "INCIO", "estudiantes" => $estudiantes, "exito" => 'Actualizado']);

                }
            else
                {
                    $estudiantes = $estudiante->obtener();
                    return $this->view('index',["title" => 'INCIO', 'estudiantes'=> $estudiantes]);
                }



        }


    }


}
?>
