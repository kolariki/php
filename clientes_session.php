<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoClientes"])) {
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if ($_POST) {

    if (isset($_POST["btnEnviar"])) {
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = array("nombre" => $nombre, "dni" => $dni, "telefono" => $telefono, "edad" => $edad);

        $_SESSION["listadoClientes"] = $aClientes;
    }

    if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $aClientes = array();
    }
}


if (isset($_GET["pos"])) {
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}


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
    <header>

    </header>
    <main>
        <div class="container">
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h1>Listado de clientes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-4 pt-5">
                    <form action="" method="POST">
                        <div class="my-4">
                            <label for="">Nombre:
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">DNI:
                                <input type="text" name="txtDni" id="txtDni" class="form-control">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="">Telefono:
                                <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="">Edad:
                                <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                            </label>
                        </div>
                        <div class="my-3">
                            <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Enviar</button>
                            <button type="submit" name="btnEliminar" class="btn bg-danger text-white">Eliminar</button>
                        </div>
                    </form>
                </div>
                <div class="col-4 col-sm-6 my-3 pt-4">
                    <table class="table table-hover border">
                        <thead>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th>Acciones:</th>
                        </thead>
                        <tbody>
                            <?php foreach ($aClientes as $pos => $cliente) : ?>
                                <tr>
                                    <td> <?php echo $cliente["nombre"]; ?> </td>
                                    <td> <?php echo $cliente["dni"] ?> </td>
                                    <td> <?php echo $cliente["telefono"] ?> </td>
                                    <td> <?php echo $cliente["edad"] ?> </td>
                                    <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</html>