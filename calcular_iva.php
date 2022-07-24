<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;

if($_POST) {
$iva = $_POST["lstIva"];
$precioSinIva = ($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"] : 0;
$precioConIva = ($_POST["txtPrecioConIva"]) > 0? $_POST["txtPrecioConIva"] : 0;

if($precioSinIva > 0){
    $precioConIva = $precioSinIva * ($iva/100+1);
}

if($precioConIva > 0){
    $precioSinIva = $precioConIva / ($iva/100+1);
}

$ivaCantidad = ($precioConIva - $precioSinIva);

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<header>
  
</header>
<main>
    <div class="container">
        <div class="row my-5">
            <div class="col-12 text-center">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 col-sm-3 offset-1 offset-sm-3">
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="">IVA
                        <select name="lstIva" class="form-control">
                            <option value="10.5">10.5</option>
                            <option value="19">19</option>
                            <option value="21">21</option>
                            <option value="27">27</option>
                        </select>
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">Precio sin IVA:
                            <input type="text" name="txtPrecioSinIva" id="txtPrecioSinIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">Precio con IVA:
                            <input type="text" name="txtPrecioConIva" id="txtPrecioConIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6 col-sm-4 my-3 pt-4">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva;?> %</td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td><?php echo number_format($precioSinIva,2 , ",", ".")?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td><?php echo number_format($precioConIva,2 , ",", ".")?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td><?php echo number_format($ivaCantidad ,2 , ",", ".")?> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
</html>
