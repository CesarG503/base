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
       <li><a href="./landin">Landin</a></li>
    </ul>

    <form action="./" method="post">
        <input type="text" name="nombre" placeholder="nombre"> <br>
        <input type="number" name="edad" placeholder="edad"> <br>
        <input type="text" name="apellido" placeholder="apellido"> <br>
        <input type="text" name="grado" placeholder="grado"> <br>

        <input type="submit" value="ACEPTAR">
    </form>

    <?php  if(isset($exito)){echo $exito;}?>
    <?php  if(isset($error)){echo $error;}?>


    <table border="1">

    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Apellido</th>
            <th>Grado</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>

        <?php if(isset($estudiantes) & !empty($estudiantes)):?>
            
            <?php foreach($estudiantes as $estudiante): ?>
                <tr>
                    <td><?= $estudiante['nombre'] ?></td>
                    <td><?= $estudiante['edad'] ?></td>
                    <td><?= $estudiante['apellido'] ?></td>
                    <td><?= $estudiante['grado'] ?></td>
                    <td><form action="./borrar" method="post"> <button value="<?= $estudiante['id'] ?>" name="borrar">Borrar</button></form></td>
                </tr>
            <?php endforeach; ?>
        
        <?php else: ?>
        <tr>
            <td colspan="5">No hay estudiantes</td>
        </tr>
        <?php endif;?>
    </tbody>
    </table>

   
    
    
</body>
</html>