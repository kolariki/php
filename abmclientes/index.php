<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//preguntar si existe el archivo
if (file_exists("archivo.txt")){
    //vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");


//Convertir jsonClientes en un array llamado aClientes    
$aClientes = json_decode($jsonClientes, true);


} else {
//si no existe el archivo 
    //Creamos un aClientes inicializado como un array vacio    
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if ($_POST) {
        $documento = trim($_POST["txtDocumento"]);
        $nombre = trim($_POST["txtNombre"]);
        $telefono = trim($_POST["txtTelefono"]);
        $correo= trim($_POST["txtCorreo"]);
        $nombreImagen = "";


        if($pos >= 0){
            if($_FILES["archivo"] ["error"] === UPLOAD_ERR_OK){
                $nombreAleatorio = date("Ymdhmsi"); 
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
                if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                    $nombreImagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_tmp, "imagen/$nombreImagen");
                }
                //eliminar imagen anterior
                if($aClientes[$pos]["imagen"] != "" && file_exists("imagen/".$aClientes[$pos]["imagen"])){
                    unlink("imagen/".$aClientes[$pos]["imagen"]);
                }

            } else{
                //mantener el nombreImagen que teniamos antes
                $nombreImagen = $aClientes[$pos]["imagen"];
            }
            $aClientes[$pos] = array(   "documento" => $documento, 
                                        "nombre" => $nombre, 
                                        "telefono" => $telefono, 
                                        "correo" => $correo,
                                        "imagen" => $nombreImagen);

        } else {
            if($_FILES["archivo"] ["error"] === UPLOAD_ERR_OK){
            $nombreAleatorio = date("Ymdhmsi"); 
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagen/$nombreImagen");
            }
        }

            $aClientes[] = array(   "documento" => $documento, 
                                    "nombre" => $nombre, 
                                    "telefono" => $telefono, 
                                    "correo" => $correo,
                                    "imagen" => $nombreImagen);
        }
       

        //convertir el array de clientes a json
            $jsonClientes = json_encode($aClientes);
        //almacenar el string json en "archivo.txt"
        file_put_contents("archivo.txt", $jsonClientes);
       

}



if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    //eliminar del array Aclientes la posicion a borrar unset()
 unset($aClientes[$pos]);

 //convertir el array de clientes a  jsonClientes
 $jsonClientes = json_encode($aClientes);

 //almacenar el string jsonClientes en el "archivo.txt"
file_put_contents("archivo.txt", $jsonClientes);
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
    <title>Registro</title>
</head>
<body>
<main>
        <div class="container">
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h1>Registro de clientes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-5 pt-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                       
                                <label for="">DNI:*</label>
                                <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"] : ""; ?>" placeholder="000000000">
                       
                        
                                <label for="">Nombre:*</label>
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control"  required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"] : ""; ?>" placeholder="Juan Perez">
                            
                      
                        
                                <label for="">Telefono:*</label>
                                <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"] : ""; ?>" placeholder="+54 000000000">
                      
                                <div class="pb-3">
                                 <label for="">Correo:*</label>
                                <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"] : ""; ?>" placeholder="aaaaa@gmail.com">
                                </div>
                        
                            <label for=""> Archivo adjunto: </label>
                           <strong> <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png"> <br> </strong>
                            <small> admitidos: .jpg, .jpeg, .png </small>
                       
                        <div class="py-3">
                            <button type="submit" name="btnGuardar" class="btn bg-primary text-white">Guardar</button>
                            <a href="index.php" class="btn btn-danger my-2">NUEVO</a>
                        </div>
                    </form>
                </div>
                <div class="col-4 col-sm-7 my-3 pt-4">
                    <table class="table table-hover border">
                        <thead>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php foreach($aClientes as $pos => $cliente): ?>
                        
                                <tr>
                                    <td>
                                        <?php if ($cliente["imagen"] != "") : ?>
                                        <img src="imagen/<?php echo $cliente["imagen"]; ?>" class = "img-thumbnail"><?php ?> 
                                        <?php endif; ?>
                                    </td>
                                    <td> <?php echo $cliente["documento"] ?> </td>
                                    <td> <?php  echo $cliente["nombre"]?> </td>
                                    <td> <?php echo $cliente["correo"] ?> </td>
                                    <td>
                                        <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash-fill"></i></a>
                                    </td>  
                                </tr>     
                                <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>