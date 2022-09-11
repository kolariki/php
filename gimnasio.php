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

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this-> dni = $dni;
        $this-> nombre = $nombre;
        $this-> correo = $correo;
        $this-> celular = $celular;
        
    }
 
}

class Alumno extends Persona{
    Private $fechaNac;
    Private $peso;
    Private $altura;
    Private $aptoFisico;
    Private $presentismo;

    public function __construct($dni,$nombre,$correo, $celular, $fechaNac )
    {
        parent:: __construct($dni,$nombre,$correo, $celular);
        $this-> fechaNac = $fechaNac;
        $this-> peso = 0.0;
        $this-> altura =0.0;
        $this-> aptoFisico = false;
        $this -> presentismo = 0.0;
        
    }

    public function setFichaMedica(){
}
   
    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }

}

class Entrenador extends Persona {
    Private $aClases;

    public function asignarClase($clase){
        $this-> aClase [] = $clase;
    }

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent:: __construct($dni,$nombre,$correo, $celular);
        $this-> aClases = array();
        
    }

    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }

  
}


class Clase{
    Private $nombre;
    Private $entrenador;
    Private $aAlumnos;

    public function asignarEntrenador($entrenador){
        $this-> entrenador = $entrenador;
    }

    public function inscribirAlumno($alumno){
        $this-> aAlumnos[] = $alumno;
    }

    public function __construct()
    {
        $this-> aAlumnos = array();
        
    }

    public function __get($propiedad){
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){
        return $this -> $propiedad = $valor;
    }

    public function imprimirListado(){
        
        echo "<table class= 'table table-hover border'>";
        echo "<tr><th class='table-dark text-center' colspan='4'>Clase: " .$this->nombre . "</th></tr>";
        echo "<tr><th  colspan='2'>Entrenador:</th><td colspan='2'> " .$this->entrenador -> nombre . "</td></tr>";
        echo "<tr><th  colspan='4'>Alumnos Inscriptos: </th></tr>";
        echo "<tr><th DNI</th><th>Nombre</th><th>Correo</th><th>Celular</th>";
         foreach ($this-> aAlumnos as $alumno){
           echo "<tr><td> " . number_format($alumno -> dni, 0, ",", ".") . "</td> <td>" . $alumno -> nombre . "</td><td>" .
            $alumno -> correo . "</td> <td>" . $alumno->celular . "</td></tr>";
         }
        echo "</table>";
     }
    
}



$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634" );
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654" );

$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "11768654", "1997-08-28" );
$alumno1 -> setFichaMedica(90, 178, true);
$alumno1 -> presentismo = 78;

$alumno2 = new Alumno("46766547", "Dario Turchi", "dario@mail.com", "11768654", "1986-11-21" );
$alumno2 -> setFichaMedica(79, 168, false);
$alumno2 -> presentismo = 68;

$alumno3 = new Alumno("40787657", "Facundo Fagnano", "facundo@mail.com", "11768654", "1993-02-06" );
$alumno3 -> setFichaMedica(90, 187, true);
$alumno3 -> presentismo = 88;

$alumno4 = new Alumno("40787657", "Gaston Aguilar", "gaston@mail.com", "11768654", "1999-11-02" );
$alumno4 -> setFichaMedica(70, 169, false);
$alumno4 -> presentismo = 98;


$clase1 = new Clase();
$clase1 -> nombre = "Funcional";
$clase1 -> asignarEntrenador($entrenador1);
$clase1 -> inscribirAlumno($alumno1);
$clase1 -> inscribirAlumno($alumno3);
$clase1 -> inscribirAlumno($alumno4);
$clase1 -> imprimirListado();

$clase2 = new Clase();
$clase2 -> nombre = "Zumba";
$clase2 -> asignarEntrenador($entrenador2);
$clase2 -> inscribirAlumno($alumno1);
$clase2 -> inscribirAlumno($alumno2);
$clase2 -> inscribirAlumno($alumno3);
$clase2 -> imprimirListado();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </svg>
</head>
<body>
    <main class="container">
            <div class="row">
                <div class="col-12 py-5 text-center">
                    <h1>Gimnasio</h1>
                </div>
            <div class="row ">
                <div class="col-12 py-5">
                    <?php $clase2 -> imprimirListado(); ?>
                </div>
            </div>    
            <div class="row ">
                <div class="col-12 py-5">
                    <?php $clase2 -> imprimirListado(); ?>
                </div>
            </div>    
    </main>
</html>