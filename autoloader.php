<?php

spl_autoload_register(function ($class) {
    $ruta = "../" . str_replace("\\" ,"/", $class) . ".php";

    if (file_exists($ruta)) {
        require $ruta;
    }
    else {
        die("Np se puedo cargar la ruta $ruta");
    }

});
?>
