<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 80%;
            max-width: 1000px;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <div class="container">

    <h1>Incio</h1>

    <br><br><br>

    <?php  if(isset($estudiante)): ?>

        <h1>MODO EDICION</h1>
    
        <form action="./actualizar" method="post">

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="" value="<?= $estudiante['nombre'] ?>"> <br>

        <label for="">Apellido</label>
        <input type="text" name="apellido" id="" value="<?= $estudiante['apellido'] ?>"> <br>
        
        <label for="">Edad</label>
        <input type="text" name="edad" id="" value="<?= $estudiante['edad'] ?>"> <br>
        
        <label for="">Grado</label>
        <input type="text" name="grado" id="" value="<?= $estudiante['grado'] ?>"> <br>

        <input type="number" name="id" id="" value="<?= $estudiante['id'] ?>" style="display:none;"> 

        <input type="submit" value="ACEPTAR" name="accion">
        <input type="submit" value="CANCELAR" name="accion">
    
    </form>
    
    <?php  else: ?>

    <form action="./" method="post">

        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""> <br>

        <label for="">Apellido</label>
        <input type="text" name="apellido" id=""> <br>
        
        <label for="">Edad</label>
        <input type="text" name="edad" id=""> <br>
        
        <label for="">Grado</label>
        <input type="text" name="grado" id=""> <br>

        <input type="submit" value="ACEPTAR">
    
    </form>

    <?php  endif; ?>

    <?php if(isset($error)){echo $error;}?>
    <?php if(isset($exito)){echo $exito;}?>
    
    
    
    <br><br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Grado</th>
                <th>Borrar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>

        <?php  if(isset($estudiantes) && !empty($estudiantes) ): ?>

            <?php foreach($estudiantes as $estudiante): ?>

            <tr>
                <td><?= $estudiante['nombre']; ?></td>
                <td><?= $estudiante['apellido']; ?></td>
                <td><?= $estudiante['edad']; ?></td>
                <td><?= $estudiante['grado']; ?></td>
                <td><form action="./borrar" method="post"> <button name="id" value="<?= $estudiante['id']; ?>">Borrar</button></form></td>
                <td> <form action="./editar" method="post"> <button name="id" value="<?= $estudiante['id']; ?>">Editar</button></form></td>
            </tr>

            <?php endforeach; ?>

        <?php  else: ?>
            <tr>
                <td colspan="6">No hay estudiantes</td>
            </tr>
        <?php  endif; ?>

        </tbody>
    </table>


    </div>
</body>
</html>