<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//preguntar si existe el archivo
if (file_exists("archivo.txt")) {
    //si el archivo existe, cargo las tareas en la variable aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);

} else {
    //si no existe el archivo es porque no hay tareas 
    $aTareas = array();
}

if(isset($_GET["id"]) && $_GET["id"] >= 0){
    $id = $_GET["id"];
} else {
    $id="";
}

//$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if ($_POST) {
    $prioridad = $_POST["lstPrioridad"];
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
           
        );
            
        } else {
            //estoy insertando una tarea
            $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
      
            );
        }
        
//convertir el array de aTareas en Json
$strJson = json_encode($aTareas);

//almacenar en un archivo.txt en el json con file_put_contents
file_put_contents("archivo.txt", $strJson);


}



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
                <div class="col-12 text-center py-3">
                    <h1> Gestor de Tareas</h1>
                </div>
            </div>
                <div class=row>
                    <div class="col-4">
                        <label for="lstPrioridad"> Prioridad</label>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta"? "selected" : ""; ?>> Alta </option>
                        <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media"? "selected" : ""; ?>>Media</option>
                        <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja"? "selected" : ""; ?>>Baja</option>
                    </select>
                    </div>               
                        <div class="col-4">
                        <label for="lstUsuario"> Usuario</label>
                    <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                        <option value="" disable selected>Seleccionar</option>
                        <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana"? "selected" : ""; ?>>Ana</option>
                        <option value="Bernabe"<?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe"? "selected" : ""; ?>>Bernabe</option>
                        <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela"? "selected" : ""; ?>>Daniela</option>
                    </select>
                        </div>
                        <div class="col-4">
                        <label for="lstEstado"> Estado </label>
                    <select name="lstEstado" id="lstEstado" class="form-control" required>
                        <option value="" disable selected>Seleccionar</option>
                        <option value="Sin Asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin Asignar"? "selected" : ""; ?> >Sin Asignar</option>
                        <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado"? "selected" : ""; ?> >Asignado</option>
                        <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En Proceso"? "selected" : ""; ?> >En Proceso</option>
                        <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado"? "selected" : ""; ?> >Terminado</option>
                    </select>
                        </div>

                        <div class="row">
                <div class="col-12 py-3">
                    <label for="txtTitulo"> Titulo </label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$id])? $aTareas[$id]["titulo"] :""; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3">
                    <label for="txtDescripcion"> Descripcion </label>
                    <textarea name="txtDescripcion" id="txtDescripcion" required class="form-control"><?php echo isset($aTareas[$id])? $aTareas[$id]["descripcion"] :""; ?></textarea>
                </div>
            </div>                      
            <div class="row">
                <div class="col v-center text-center">
                   <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary mx-auto"> ENVIAR</button>
                   <a href="index.php" class="btn btn-secondary  mx-auto" > CANCELAR </a>
                </div>
            </div>
                </div>
        </form>
        <?php if(count($aTareas)) : ?>
            <div class="row">
     <div class="col-12  pt-3">
                    <table class="table table-hover border">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Titulo</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aTareas as $pos => $tarea): ?>                     
                                <tr>
                                    <td><?php echo $pos ?></td>
                                    <td> <?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos ?>&do=editar" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                    </td>  
                                </tr>     
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
        <div class="row">
            <div class="col-12 pt-3">
                <div class="alert alert-info" role="alert">
                    Aun no se han cargado tareas.
                </div>
            </div>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>