<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function calcularNeto($bruto){
    return $bruto - ($bruto * 0.17);

}

echo "El sueldo bruto es " . calcularNeto(80000) . "<br>";
echo "El sueldo bruto es " . calcularNeto(70000);
?>