<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = "Ivan Kolarik";
$edad = "31";
$aPeliculas = array("Forest Gump", "Naufrago", "Avengers");

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>ficha Personal</title>
</head>

<body>


    <main class="contaniner">


        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>FICHA PERSONAL</h1>
            </div>
        </div>


        <div class="row">
            <div clas="col-12">
                <table clas="table table-hover border">
                    <tr>
                        <th>Fecha:</th>
                        <td><?php echo date("d/m/Y"); ?> </td>
                    </tr>
                    <tr>
                        <th>Nombre y Apellido: </th>
                        <td><?php echo $nombre; ?> </td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Pelicuas Favoritas:</th>
                        <td><?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas[1]; ?><br>
                            <?php echo $aPeliculas[2]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>



</body>

</html>


