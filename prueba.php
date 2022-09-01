<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;


    public function setDni($dni){ $this -> dni = $dni;}
    public function getDni($dni){ return $this -> dni;}

    public function setNombre($nombre){ $this -> nombre = $nombre;}
    public function getNombre($nombre){ return $this -> nombre;}

    public function setNacionalidad($nacionalidad){ $this -> nacionalidad = $nacionalidad;}
    public function getNacionalidad($nacionalidad){ return $this -> nacionalidad;}

    public function setEdad($edad){ $this -> edad = $edad;}
    public function getEdad($edad){ return $this -> edad;}


    public function imprimir(){}
}





class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct()
    {
        $this-> notaPortfolio =0.0;
        $this-> notaPhp = 0.0;
        $this-> notaProyecto = 0.0;
    }




    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
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
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economia Aplicada";
    const ESPECIALIDAD_BBDD = "Base de Datos";

   /* public function __destruct()
    {
        echo "Destruyendo el objeto" . $this->nombre . "<br>";
    }*/ 

    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades: <br>";
        echo "Especialidad 1: " . self::ESPECIALIDAD_BBDD . "<br>"; 
        echo "Especialidad 2: " . self::ESPECIALIDAD_ECO . "<br>";
        echo "Especialidad 3: " . self::ESPECIALIDAD_WP . "<br>";
    }
}

//PROGRAMA

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

$docente = new Docente();
$docente -> nombre = "Juan Perez";
$docente -> esoecialidad = Docente::ESPECIALIDAD_BBDD;
$docente -> imprimirEspecialidadesHabilitadas();


?>