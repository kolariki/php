<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();

$aProductos[] = array ("nombre" => "Smart TV 55\" 4K UHD",
"marca" => "Hitachi",
"modelo" => "554KS20",
"stock" => 60,
"precio" => 58000,
); 

$aProductos[] = array ("nombre" => "Samsung Galaxy A30 Blanco",
"marca" => "Samsung",
"modelo" => "Galaxy A30",
"stock" => 0,
"precio" => 22000,
);

$aProductos[] = array ("nombre" => "Aire Acondicionado Split Inverter Frio/Calor Surrey 2900F",
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
                    </thead>
                    </tr>
                    <tr>
                    <td> <?php echo $aProductos [0] ["nombre"] ?> </td>
                    <td> Hitachi</td>
                    <td> 554KS20</td>
                    <td> <?php//CON IF
                    if ($aProductos [0] ["stock"] == 0){
                        echo " Sin Stock";
                    }
                    else if ($aProductos [0] ["stock"] <= 10){
                        echo "Poco Stock";
                        }

                        else
                        {
                            echo "Hay Stock";
                        }
                    
                    ?>
                    </td>
                    <td> $58000</td>
                    <td>
                    <button type="button" class="btn btn-primary">Comprar</button>
                    </td>
                </tr>
                <tr>
                    <td> <?php echo $aProductos [1] ["nombre"] ?></td>
                    <td> Samsung</td>
                    <td> Galaxy A30</td>
                    <td> <?php//CON IF
                   if ($aProductos [1] ["stock"] == 0){
                    echo " Sin Stock";
                }
                else if ($aProductos [1] ["stock"] <= 10 ){
                    echo "Poco Stock";
                    }

                    else
                    {
                        echo "Hay Stock";
                    }
                    ?>
                    </td>
                    <td> $22000</td>
                    <td>
                    <button type="button" class="btn btn-primary">Comprar</button>
                    </td>
                    </tr>             
                    <tr>
                    <td> <?php echo $aProductos [2] ["nombre"] ?></td>
                    <td> <?php echo $aProductos [2] ["marca"] ?></td>
                    <td>  <?php echo $aProductos [2] ["modelo"] ?></td>
                    <td> <?php//CON IF
                    if ($aProductos [2] ["stock"] == 0){
                        echo " Sin Stock";
                    }
                    else if ($aProductos [2] ["stock"] <= 10 ){
                        echo "Poco Stock";
                        }

                        else
                        {
                            echo "Hay Stock";
                        }
                    ?>
                    </td>
                    <td> <?php echo $aProductos [2] ["precio"] ?></td>
                    <td>
                    <button type="button" class="btn btn-primary">Comprar</button>
                    </td>
                    </tr>                
                </table>
            </div>
        </div>
    </main>
</body>
</html>