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
    
    
</body>
</html>