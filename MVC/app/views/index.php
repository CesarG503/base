<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inicio</h1>

    <?php 

    use app\model\Database;

    $db = new Database();

    if( $db->getConnection())
        {
            echo "si";
        }
    else{
        echo "no";
    }
    
    ?>
    <?php if(isset($estudiante)):?>
        <h2>MODO EDICION</h2>
    <form action="./actualizar" method="post" >

        <input type="text" value="<?= $id;?>" name="id" style="display:none;" >

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="" value="<?= $estudiante['nombre']?>"><br>
       
        <label for="">Apellido</label>
        <input type="text" name="apellido" id="" value="<?= $estudiante['apellido']?>"><br>
        
        <label for="">Edad</label>
        <input type="text" name="edad" id="" value="<?= $estudiante['edad']?>"><br>
         
        <label for="">Grado</label>
        <input type="text" name="grado" id="" value="<?= $estudiante['grado']?>"><br>

        

        <input type="submit" value="ACEPTAR" name="accion">
        <input type="submit" value="CANCELAR" name="accion">
    </form>

    <?php else: ?>

    <form action="./estudiante" method="post">

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

    <?php endif; ?>

    <?php  if(isset($error)){ echo $error;} ?>
    <?php  if(isset($exito)){ echo $exito;} ?>
    

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
            <?php if(isset($estudiantes)):?>
                <?php foreach($estudiantes as $estudiante): ?>
                <tr>
                    <td><?= $estudiante['nombre']?></td>
                    <td><?= $estudiante['apellido']?></td>
                    <td><?= $estudiante['edad']?></td>
                    <td><?= $estudiante['grado']?></td>
                    <td><form action="./" method="post"> <button name="id" value="<?= $estudiante['id']?>">Eliminar</button></form></td>
                    <td><form action="./editar" method="post"><button name="id" value="<?= $estudiante['id'];?>]">Editar</button></form></td>
                </tr>
                <?php endforeach; ?>
            <?php else:?>
                <tr>
                    <td colspan="5">No hay estudiantes</td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>
    
    
</body>
</html>