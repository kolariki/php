<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;
    
    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }
 
}

class Cliente extends Persona{
    Private $aTarjetas;
    Private $bActivo;
    Private $fechaAlta;
    Private $fechaBaja;

    public function __construct()
    {       
        $this-> aTarjetas = array();
        $this-> bActivo = true;
        $this-> fechaAlta = date("d/m/Y");
    }


    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }


    public function agregarTarjeta($tarjeta){
        $this-> aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fecha){
    $this->fechaBaja = $fecha;
    $this->bActivo = false;//baja logica    
    }

public function imprimir()
{
    
}

  
}

class Tarjeta {
    Private $nombreTitular;
    Private $numero;
    Private $fechaEmision;
    Private $fechaVto;
    Private $tipo;
    Private $cvv;

const VISA = "VISA";
const MASTERCARD = "Mastercard";
const AMEX = "American Express";
const CABAL = "Cabal";

public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv){       
        $this-> numero = $numero;
        $this-> fechaEmision = $fechaEmision;
        $this-> fechaVto = $fechaVto;
        $this-> tipo = $tipo;
        $this-> cvv = $cvv;

    }

    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }

  
}



$cliente1 = new Cliente();
$cliente1 -> dni = "35123789";
$cliente1 -> nombre = "Ana Valle";
$cliente1 -> correo = "ana@correo.com";
$cliente1 -> celular = "1156781234";
$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750778806383", "03/2022", "01/2023", "275");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347572886751981", "05/2020", "07/2027", "136");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "5415620495970009", "06/2021", "12/2024", "742");
$cliente1 -> agregarTarjeta($tarjeta1);
$cliente1 -> agregarTarjeta($tarjeta2);
$cliente1 -> agregarTarjeta($tarjeta3);


$cliente2 = new Cliente();
$cliente2 -> dni = "48456876";
$cliente2 -> nombre = "Bernabe PAz";
$cliente2 -> correo = "bernabe@correo.com";
$cliente2 -> celular = "11453226787";
$cliente2 -> agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4223750778806383", "03/2022", "01/2023", "275"));
$cliente2 -> agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5415620495970009", "06/2021", "12/2024", "742"));
$cliente2 -> darDeBaja ("23/08/2022");


print_r($cliente1);
print_r($cliente2);

?>


