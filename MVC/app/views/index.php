<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inicio</h1>

    <form action="/MVC/public/get" method="get">

        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""><br>
       
        <label for="">Apellido</label>
        <input type="text" name="apellido" id=""><br>
        
        <label for="">Edad</label>
        <input type="text" name="edad" id=""><br>
         
        <label for="">Grado</label>
        <input type="text" name="grado" id=""><br>

        <input type="submit" value="ACEPTAR">
    </form>


    <?php if(isset($title)){ echo $title; }?>
    

    
    
</body>
</html>