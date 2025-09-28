<?php

namespace app\controller;
class IndexController
{
    public function view($vista, $data=[])
    {
        extract($data); //convierte el array asociativo en variables dentro de vista

        if (file_exists("../app/views/$vista.php")) {
            ob_start();

            include("../app/views/$vista.php");
            $content = ob_get_clean();
            return $content;
        }
        else{
            echo "vista no encontrada!! no hay archivo llamado $vista";
        }
    }

    public function Index()
    {
        return $this->view("index", ["title", "Mi sitio de inicio"]);
    }

}
?>
