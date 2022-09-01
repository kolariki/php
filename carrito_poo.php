<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{
    Private $dni;
    Private $nombre;
    Private $correo;
    Private $telefono;
    Private $descuento;

    public function __construct()
    {
        $this-> descuento = 0.0;

    }

    
    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }
    public function imprimir(){
        echo "nombre: " . $this->nombre . "<br>";
        echo "dni: " . $this -> dni . "<br>";
        echo "edad: " . $this ->  telefono . "<br>";
        echo "nacionalidad: " . $this -> correo . "<br>";
        echo "legajo: " . $this -> descuento . "<br> <br>";
    }
   
}

class Producto{
    Private $cod;
    Private $nombre;
    Private $precio;
    Private $descripcion;
    Private $iva;


    public function __construct()
    {
        $this-> precio = 0.0;
        $this-> iva = 0.0;
        
    }

    
    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }

    public function imprimir(){
        echo "nombre: " . $this->nombre . "<br>";
        echo "dni: " . $this -> cod . "<br>";
        echo "edad: " . $this ->   precio . "<br>";
        echo "nacionalidad: " . $this -> descripcion . "<br>";
        echo "legajo: " . $this -> iva . "<br> <br>";
    }
}

class Carrito{
    Private $cliente;
    Private $aProductos;
    Private $subTotal;
    Private $total;
    Private $iva;

    public function cargarProducto($producto){
        $this-> aProductos [] = $producto;
    }
    public function imprimir(){}
    public function imprimirTicket(){
        
        echo "<table class= 'table table-hover border'> 
                 <tr>
                          <th>Fecha: </th>
                             <td>" . date("d/m/Y H:i:s") . "</td>
                 </tr>
                 <tr> 
                         <th>DNI: </th>
                             <td>" . $this -> cliente -> dni. "</td>
                 </tr>
                 <tr> 
                         <th>Nombre: </th>
                             <td>" . $this -> cliente -> nombre. "</td>
                 </tr>
                 <tr> 
                         <th colspan='2'>Productos: </th>
                 </tr>";
                     foreach ($this-> aProductos as $producto){
           echo "<tr>
                         <td>" . $producto -> nombre . "</td>
                         <td> $ " . number_format($producto -> precio, 2, ",", ".") . "</td>
                 </tr>";
                     $this -> subTotal +=  $producto -> precio;
                     $this -> total +=  $producto -> precio * (($producto -> iva /100) +1);
                 }
         echo "<tr> 
                         <th> Subtotal s/IVA: </th>
                             <td> $ ". number_format($this -> subTotal, 2, ",", ".") . "</td>
             </tr>
             <tr>
                         <th>TOTAL: </th>
                             <td> $ ". number_format($this -> total, 2, ",", ".") . "</td>
             </tr>
        </table>";
     }

    public function __construct()
    {
        $this-> aProductos = array();
        $this-> subtotal =0.0;
        $this-> total = 0.0;
        
    }

    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }
}


$cliente1 = new Cliente();
    $cliente1 -> dni = "34553123";
    $cliente1 ->nombre = "Bernabe";
    $cliente1 ->correo ="bernabe@gmail.com";
    $cliente1 ->telefono = "+541188598686";
    $cliente1 -> descuento = 0.05;
    $cliente1 -> imprimir();


    $producto1 = new Producto();
    $producto1 -> cod = "AB8767";
    $producto1 ->nombre = "Notebook Hp";
    $producto1 ->precio =30800;
    $producto1 ->descripcion = "Esta es una computadora HP";
    $producto1 -> iva = 21;
    $producto1 -> imprimir();

    

    $producto2 = new Producto();
    $producto2 -> cod = "QWR579";
    $producto2 ->nombre = "Heladera Wirpool";
    $producto2->precio =76000;
    $producto2 ->descripcion = "Esta es una heladera no froze";
    $producto2 -> iva = 10.5;
    $producto2-> imprimir();
   
    

    $carrito = new Carrito();
    $carrito -> cliente = $cliente1;
    $carrito ->cargarProducto($producto1);
    $carrito ->cargarProducto($producto2);
    $carrito ->imprimirTicket();
    $carrito -> imprimir();
    
   ?>
    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </svg>
</head>
<body>
    <main>
        <div class="container">
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h1>Ticket</h1>
                    <?php $carrito -> imprimirTicket(); ?>
                </div>
            </div>  
                </div>
    </main>
</html>