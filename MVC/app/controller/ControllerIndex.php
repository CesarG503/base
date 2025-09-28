<?php 

namespace app\controller;

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
        return $this->view('index',["title" => 'Pagina de inciio']);
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

}
?>
