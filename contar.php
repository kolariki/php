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

    
    
    

$aNotas = array(9,8,9.5,4,7,8);

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
              

    echo "cantidad de pacientes:" . contar($aPacientes) . "<br>";
    echo "cantidad de productos:" . contar($aProductos) . "<br>";
    echo "cantidad de notas:" . contar($aNotas);

//print_r($aProductos);
?>
