<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//si existe el archivo invitados lo abrimos y cargamos en un variable del tipo array
//los DNI permitidos
if (file_exists("invitados.txt")) {
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");
} else {
    //si no existe el archivo es porque no hay tareas 
    $aDocumentos = array();
}

if($_POST) {
    
    if (isset($_POST["btnProcesar"])) {
        $documento = $_REQUEST["txtDocumento"];  
        if (in_array($documento, $aDocumentos)) {
            $msg = "Bienvenid@";
        } else {
            $msg = "No se encuentra en la lista de invitados";
        }
    }


if (isset($_POST["btnVip"])) {
    $codigo = $_REQUEST["txtCodigo"];  
    if ($codigo == "verde") {
        $msg = "Su codigo de acceso es " . rand(1000, 9999);
    } else {
        $msg = "Ud. no tiene pase VIP";
    }
}


}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </svg>
    <title>Gestor</title>
</head>

<body>
    <main class="container">
        <form action="" method="POST">
        <?php if(isset($msg)): ?>
				  	<div class="alert alert-danger" role="alert">
						<?php echo $msg; ?>
					</div>
				  <?php endif; ?>
            <div class="row">
                <div class="col-12  py-3">
                    <h1> Lista de invitados</h1>
                </div>
                <div>
                    <p>Complete el siguiente formulario:</p>
                </div>
            </div>
            <div class=row>
                <div class="col-8 py-3">
                    <label for="lstPrioridad"> Ingrese el DNI:</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <button type="submit" name="btnProcesar" id="btnProcesar" class="btn btn-primary mx-auto"> Verificar invitado </button>
            </div>
            <div class="col-8 py-3">
                <label for="lstUsuario"> Ingresa el código secreto para el pase VIP:</label>
                <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
            </div>
            </div>
            <div class="col-4">
                <button type="submit" name="btnVip" id="btnVip" class="btn btn-primary mx-auto"> Verificar invitado </button>
            </div>

    </main>
</body>

</html>