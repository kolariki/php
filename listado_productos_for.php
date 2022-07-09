<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();

$aProductos[0] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);

$aProductos[1] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);

$aProductos[2] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frio/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
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
        <h1 class="text-center pb-3"> Listado de productos </h1>
        <div class="row">
            <div class="col-12 ">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php
                    $sumatoriaPrecios= 0;
                    $contador = 0;
                    for ($contador =0; $contador < count($aProductos); $contador++ ) {
                        $sumatoriaPrecios += $aProductos[$contador]["precio"];
                        ?>
                    <tr>
                        <td> <?php echo $aProductos[$contador]["nombre"] ?> </td>
                        <td> <?php echo $aProductos[$contador]["marca"] ?></td>
                        <td> <?php echo $aProductos[$contador]["modelo"] ?></td>
                        <td> <?php echo $aProductos[$contador]["stock"] > 10 ? "Hay Stock" : ($aProductos[$contador]["stock"] > 0 && $aProductos[$contador]["stock"] <= 10 ? "Poco Stock" : "Sin stock");?></td>
                        <td> <?php echo "$" . $aProductos[$contador]["precio"] ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <?php
                  
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
<p> La sumatoria de los Productos es <?php echo "$".$sumatoriaPrecios?></p>
            </div>

        </div>
    </main>
</body>

</html>