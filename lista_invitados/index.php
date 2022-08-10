<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//si existe el archivo invitados lo abrimos y cargamos en un variable del tipo array
//los DNI permitidos
if (file_exists("invitados.txt")) {
    $strJson = file_get_contents("invitados.txt");
    $aInvitados = json_decode($strJson, true);

} else {
    //si no existe el archivo es porque no hay tareas 
    $aInvitados = array();
}

/*if(isset($_GET["id"]) && $_GET["id"] >= 0){
    $id = $_GET["id"];
} else {
    $id="";
}*/

//$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if ($_POST) {
        //Si el codigo es "verde" entonces mostrara Su codigo de acceso es...

    /*$prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];


    if ($id >= 0) {
        //estoy editando una tarea
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
           
        );*/
            
        } else {
            //sino ud. no tiene pase VIP
            
        }
        
/*convertir el array de aTareas en Json
$strJson = json_encode($aTareas);

//almacenar en un archivo.txt en el json con file_put_contents
file_put_contents("archivo.txt", $strJson);


}*/



if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    //eliminar del array aTareas la posicion a borrar unset()
    unset($aTareas[$id]);

    //convertir el array de clientes a  jsonClientes
    $strJson = json_encode($aTareas);

    //almacenar el json en el "archivo.txt"
    file_put_contents("archivo.txt", $strJson);
    header("Location: index.php");
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
            <div class="row">
                <div class="col-12  py-3">
                    <h1> Lista de invitados</h1>
                </div>
                
        <div class="row">
            <div class="col-12 pt-3">
                <div class="alert alert-info" role="alert">
                    Bienvenid@ a la fiesta.
                </div>
            </div>
        </div>

    
        
                <div>
                    <p>Complete el siguiente formulario:</p>
                </div>
            </div>
                <div class=row>
                    <div class="col-8 py-3">
                        <label for="lstPrioridad"> Ingrese el DNI:</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control"></div>
                    </div>
                    <div class="col-4">
                    <button type="submit" name="btnProcesar" id="btnProcesar" class="btn btn-primary mx-auto"> Verificar invitado </button>
                    </div>               
                        <div class="col-8 py-3">
                        <label for="lstUsuario"> Ingresa el código secreto para el pase VIP:</label>
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control"></div>
                        </div>
                        <div class="col-4">
                        <button type="submit" name="btnVip" id="btnVip" class="btn btn-primary mx-auto"> Verificar invitado </button>
                        </div>
        
    </main>
</body>
</html>