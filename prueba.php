<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){}
}



class Alumno extends Persona {
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct()
    {
        $this-> notaPortfolio =0.0;
        $this-> notaPhp = 0.0;
        $this-> notaProyecto = 0.0;
    }
    public function sumar(){}

    public function imprimir(){
        echo "nombre: " . $this->nombre . "<br>";
        echo "dni: " . $this -> dni . "<br>";
        echo "edad: " . $this ->  edad . "<br>";
        echo "nacionalidad: " . $this -> nacionalidad . "<br>";
        echo "legajo: " . $this -> legajo . "<br>";
        echo "notaPortfolio: " . $this -> notaPortfolio . "<br>";
        echo "notaProyecto: " . $this -> notaProyecto . "<br>";
        echo "notaPhp: " . $this -> notaPhp . "<br>";
        echo "promedio: " . number_format($this -> Calcularpromedio(), 2, ",", ".") . "<br><br>";
    }
    public function calcularPromedio(){
        return ($this -> notaPortfolio + $this -> notaProyecto + $this -> notaPhp)/3;
    }

}

class Docente extends Persona{
    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1 -> dni = "33252121";
$alumno1 -> nombre = "Ana Valle";
$alumno1 ->  edad = "14";
$alumno1 -> nacionalidad = "Argentino";
$alumno1 -> legajo = "N° - 152";
$alumno1 -> notaPortfolio = "7";
$alumno1 -> notaProyecto = "7";
$alumno1 -> notaPhp = "9";
$alumno1 -> calcularPromedio();
$alumno1 -> imprimir();

$alumno2 = new Alumno();
$alumno2 -> dni = "3712341";
$alumno2 -> nombre = "Bernabe";
$alumno2 ->  edad = "17";
$alumno2 -> nacionalidad = "Chaqueño";
$alumno2 -> legajo = "N° - 153";
$alumno2 -> notaPortfolio ="9";
$alumno2 -> notaProyecto = "6";
$alumno2 -> notaPhp ="7";
$alumno2 -> calcularPromedio();
$alumno2 -> imprimir();

?>