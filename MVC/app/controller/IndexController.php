<?php 

namespace app\controller;

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
            else{echo "No se ecntro el archivo $view.php";}
    }

    public function Index()
    {
        return $this->view('index',['title' => 'Inicio']);
    }

}
?>
