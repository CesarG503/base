<?php 

namespace app\controller;
use app\model\estudiantes;
use app\model\Database;

class IndexController
{

    public function view($view,$data=[])
    {
        extract($data);

        if(file_exists("../app/views/$view.php"))
            {
                ob_start();
                include("../app/views/$view.php");
                $content = ob_get_clean();
                return $content;
            }
        else{echo 'No se encontro la vista';}
    }

    public function Index()
    {

        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new estudiantes($conn);

        $estudiantes = $estudiante->obtener();

        return $this->view('index',['title' => 'INICIO', 'estudiantes' => $estudiantes]);
    }

    public function Eliminar()
    {

        $db = new Database();
        $conn = $db->getConnection();
        $estudiante = new estudiantes($conn);

        $estudiante->borrar($_POST['id']);

        $estudiantes = $estudiante->obtener();

        return $this->view('index',['title' => 'INICIO', 'estudiantes' => $estudiantes]);

    }

    public function Agregar()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new estudiantes($conn);

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $grado = $_POST['grado'];

        $estudiantes = $estudiante->obtener();

        if(empty($nombre) || empty($apellido) || empty($edad) || empty($grado))
            {
                return $this->view('index', ['title'=>'INICIO','estudiantes' => $estudiantes, 'error'=> 'Todos los campos son obligatorios!']);               
            }
        else{
            $estudiante->nombre = $nombre;
                $estudiante->apellido = $apellido;
                $estudiante->edad = $edad;
                $estudiante->grado = $grado;

                $estudiante->create();
                $estudiantes = $estudiante->obtener();

                return $this->view('index', ['title'=>'INICIO','estudiantes' => $estudiantes, 'exito'=> 'Estudiante Creado']);
            }

    }

    public function Editar()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new estudiantes($conn);

        $id = $_POST['id'];
        $seleccion = $estudiante->selectId($id);

        $estudiantes = $estudiante->obtener();

        return $this->view('index',['title' => 'INCIO', 'estudiantes' => $estudiantes,'estudiante'=>$seleccion, 'id' =>$id]);


    }

    public function Actualizar()
    {

        $db = new Database();
        $conn = $db->getConnection();
        $estudiante = new estudiantes($conn);
        $estudiantes = $estudiante->obtener();

        if($_POST['accion'] === "ACEPTAR")
            {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $edad = $_POST['edad'];
                $grado = $_POST['grado'];

                

                if(empty($nombre) || empty($apellido) || empty($edad) || empty($grado))
                    {
                        $estudiantes = $estudiante->obtener();
                        return $this->view('index', ['title'=>'INICIO','estudiantes' => $estudiantes, 'error'=> 'Todos los campos son obligatorios!']);               
                    }
                else{
                        $estudiante->nombre = $nombre;
                        $estudiante->apellido = $apellido;
                        $estudiante->edad = $edad;
                        $estudiante->grado = $grado;

                        $estudiante->actualizar((int)$_POST['id'] ); //truncar a ID
                        $estudiantes = $estudiante->obtener();

                        return $this->view('index', ['title'=>'INICIO','estudiantes' => $estudiantes, 'exito'=> 'Estudiante Actualizado']);
                    }


            }
        else{
            return $this->view('index',['title' => 'INICIO', 'estudiantes' => $estudiantes]);
        }        

    }


}
?>
