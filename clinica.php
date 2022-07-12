<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();

$aPacientes[0] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => "45",
    "peso" => 81.5,
);

$aPacientes[1] = array(
    "dni" => "33.684.385",
    "nombre" => "Gonzalo Bustamamte",
    "edad" => "66",
    "peso" => 79,
);

$aPacientes[2] = array(
    "dni" => "33.684.385",
    "nombre" => "Juan Iraola",
    "edad" => "28",
    "peso" => 79,
);

$aPacientes[3] = array(
    "dni" => "33.684.385",
    "nombre" => "Beatriz Ocampo",
    "edad" => "30",
    "peso" => 79,
);

                    

//print_r($aProductos);
?>



<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Listado</title>
</head>

<body>

    <main class="container">
        <h1 class="text-center pb-3"> Listado de Pacientes </h1>
        <div class="row">
            <div class="col-12 ">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y Apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php
                    $contador = 0;
                    for ($contador =0; $contador < count($aPacientes); $contador++ ) {
                        ?>
                    <tr>
                        <td> <?php echo $aPacientes[$contador]["dni"] ?> </td>
                        <td> <?php echo $aPacientes[$contador]["nombre"] ?></td>
                        <td> <?php echo $aPacientes[$contador]["edad"] ?></td>
                        <td> <?php echo $aPacientes[$contador]["peso"] ?> </td>
                    </tr>
                    <?php
                  
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
     </div>
    </main>
</body>

</html>