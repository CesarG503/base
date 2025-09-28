<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1><?= $title; ?></h1>

    <ul>
       <li><a href="./">Index</a></li>
       <li><a href="./form">Form</a></li>
       <li><a href="./cam">Cam</a></li>
       <li><a href=".landin">Landin</a></li>
    </ul>


    <form action="" method="post">
        <label for="nombre">Ingresa el nombre</label><input type="text" placeholder="nombre" name="nombre"><br>

        <label for="apellido">Ingresa el apellido</label><input type="text" placeholder="apellido" name="apellido"><br>

        <label for="telefono">Ingresa su numero de telefono</label><input type="text" placeholder="telefono" name="telefono"><br>

        <label for="correo">Ingresa su correo</label><input type="text" placeholder="correo" name="correo"><br>

        <input type="submit" value="ACEPTAR">
    </form>


    <?php if(isset($error)){ echo $error;} ?>

    <?php  if(isset($nombre)): ?>

        <ul>
            <li><?= $nombre?></li>
            <li><?= $apellido?></li>
            <li><?= $telefono?></li>
            <li><?= $correo?></li>
        </ul>

    <?php  endif; ?>

    <?php if(isset($errores)){

        foreach($errores as $error => $valor){
            echo $valor .'<br>' ;
        }
    }?>
    
    
    
    

</body>
</html>
