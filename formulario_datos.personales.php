<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];


    if ($usuario && $clave != "") {
        header("Location: acceso-confirmado.php");
    } else {
        $msg = "Valido para usuarios registrados.";
    }
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>index</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1 class="text-center"> Formulario de datos personales </h1>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="resultado.php">
                <div class="col-8 py-2">
                    <label for=""> Nombre:* </label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                </div>
                <div class="col-8 py-2">
                    <label for=""> DNI:* </label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                </div>
                <div class="col-8 py-2">
                    <label for=""> Telefono:* </label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                </div>
                <div class="col-8 py-2">
                    <label for=""> Edad:* </label>
                    <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                </div>

                <div class="col-6 py-3">
                    <a href="resultado.php"><button type="submit" name="btnIngresar" class="btn btn-primary" id="ok"> ENVIAR </button> </a>
                </div>          
        </div>
        </form>
        </div>
        </div>
    </main>
</body>

</html>