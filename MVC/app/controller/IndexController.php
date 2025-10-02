<?php 

namespace app\controller;

class IndexController
{
    public function view($view, $data=[])
    {
        extract($data);

        if(file_exists("../app/views/$view.php"))
            {
                ob_start();
                include("../app/views/$view.php");
                $content = ob_get_clean();
                return $content;
            }
        else{echo "No se encontro el archivo";}

    }

    public function Index()
    {
        return $this->view('index', ["title" => "INCIO"]);
    }

    public function Get()
    {
        // Procesar datos enviados por GET
        $nombre = $_GET['nombre'] ?? null;
        $apellido = $_GET['apellido'] ?? null;
        $edad = $_GET['edad'] ?? null;
        $grado = $_GET['grado'] ?? null;

       
        return $this->view('index', ["title" => "GOD"]);
    }

}

?>
