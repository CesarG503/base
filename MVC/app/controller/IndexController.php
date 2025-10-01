<?php 

namespace app\controller;

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
        return $this->view('index',['title' => 'INICIO']);
    }


}
?>
