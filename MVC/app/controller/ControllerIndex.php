<?php 

namespace app\controller;
use app\model\Database;
use app\model\Estudiantes;

class ControllerIndex{

    public function view($view, $data = [])
    {
        extract($data);

        if(file_exists("../app/views/$view.php"))
            {
                ob_start();
                include("../app/views/$view.php");
                $content = ob_get_clean();
                return $content;
            }
        else{ echo "no se encontro el archivo"; }
    }

    public function Index()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiantes($conn);

        return $this->view('index',["title" => 'Pagina de inciio', "estudiantes" => $estudiante->select()]);
    }

    public function Cam(){ 
        return $this->view('cam',['title'=> 'Pagina CAM']);
    }

    public function Form(){ 

        return $this->view('form',['title'=> 'Pagina FORM']);
    }

    public function FormPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];

                if(empty($nombre)|| empty($apellido) || empty($telefono) || empty($correo))//si falta algun dato da error por eso || 
                    {
                        return $this->view('form',['title'=> 'Pagina FORM', 'error' => 'Ingrese todos los datos']);

                    }
                

                $correo_regx = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
                $telefono_regx = "/^\+?[0-9]{8}$/";

                $errores = array();


                if(!preg_match($correo_regx, $correo)){

                    array_push($errores,"Correo invalido");
                
                }
                if(!preg_match($telefono_regx, $telefono)){
                    array_push($errores,"Telefono invalido");
                }

                if(empty($errores))
                    {
                        return $this->view('form',['title'=> 'Pagina FORM', 'nombre'=> $nombre, 'apellido'=> $apellido,'telefono'=> $telefono,'correo'=> $correo]);
                    }
                else{
                    return $this->view('form',['title'=> 'Pagina FORM','errores'=>$errores]);

                }
                

                

            }

    }

    public function Landin(){ 
        return $this->view('landin',['title'=> 'Pagina LANDIN']);
    }

    public function IndexPost()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $estudiante = new Estudiantes($conn);

        $estudiante->nombre = $_POST['nombre'];
        $estudiante->apellido = $_POST['apellido'];
        $estudiante->edad = $_POST['edad'];
        $estudiante->grado= $_POST['grado'];

        $result = $estudiante->create();

        if($result)
        {
            return $this->view('index',['title'=> 'pagina de incio','exito'=>'guardado en la base de datos',"estudiantes" => $estudiante->select()]);
        }
        else{return $this->view('index',['title'=> 'pagina de incio','error'=>'No se guardo',"estudiantes" => $estudiante->select()]);}
    }


    public function Delete()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $estudiante = new Estudiantes($conn);

        $estudiante->delete($_POST['borrar']);


        return $this->view('index',["title" => 'Pagina de incio',"estudiantes" => $estudiante->select()]);

    }

}
?>
