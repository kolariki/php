<?php 
$stock="800";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
</head>
<body>
    <?php
    if($stock > 0){
        echo "Hay Stock";
    }
    else{
        echo "No hay Stock";
    }
    ?>
</body>
</html>