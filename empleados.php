<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function contar($aArray){
    $contador = 0;
    foreach($aArray as $item){
        $contador++;
    }
    return $contador;
}


$aEmpleados = array();

$aEmpleados[0] = array(
    "dni" => "33300123",
    "nombre" => "David Garcia",
    "bruto" => "85000.30",
   
);

$aEmpleados[1] = array(
    "dni" => "40874456",
    "nombre" => "Ana del Valle",
    "bruto" => "90000",
    
);

$aEmpleados[2] = array(
    "dni" => "67567565",
    "nombre" => "Andres Perez",
    "bruto" => "100000",
    
);

$aEmpleados[3] = array(
    "dni" => "75744545",
    "nombre" => "Victoria Ruiz",
    "bruto" => "70000",
    
);


function calcularNeto($bruto){
    return $bruto - ($bruto * 0.17);

}
"El sueldo bruto es de: <br>";
echo  (calcularNeto(85000.30)). "<br>";
echo  (calcularNeto(90000)). "<br>";
echo  (calcularNeto(100000)). "<br>";
echo  (calcularNeto(70000));




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
        <h1 class="text-center pb-3"> Listado de Empleados </h1>
        <div class="row">
            <div class="col-12 ">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y Apellido</th>
                            <th>Bruto</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php
                    $sueldoNeto= 0;
                    $contador = 0;
                    for ($contador =0; $contador < count($aEmpleados); $contador++ ) {
                        $sueldoNeto += $aEmpleados[$contador]["bruto"];
                        ?>
                    <tr>
                        <td> <?php echo $aEmpleados[$contador]["dni"] ?> </td>
                        <td> <?php echo $aEmpleados[$contador]["nombre"] ?></td>
                        <td> <?php echo (calcularNeto(85000.30)) ?></td>
                    </tr>
                    <?php
                  
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php     
            echo "Cantidad de empleados activos:" . contar($aEmpleados);
     ?>
    </main>
</body>

</html>