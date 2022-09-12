<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/provincia.php";
include_once "entidades/localidad.php";

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

$pg = "Listado de clientes";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";
    } else if (isset($_POST["btnBorrar"])) {
        $cliente->eliminar();
        header("Location: cliente-listado.php");
    }
}

if (isset($_GET["do"]) && $_GET["do"] == "buscarLocalidad" && $_GET["id"] && $_GET["id"] > 0) {
    $idProvincia = $_GET["id"];
    $localidad = new Localidad();
    $aLocalidad = $localidad->obtenerPorProvincia($idProvincia);
    echo json_encode($aLocalidad);
    exit;
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $cliente->obtenerPorId();
}


$provincia = new Provincia();
$aProvincias = $provincia->obtenerTodos();

include_once("header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $cliente->nombre ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtCuit">Tipo de Producto:</label>
            <input type="text" required class="form-control" name="txtCuit" id="txtCuit" value="<?php echo $cliente->cuit ?>" maxlength="11">
        </div>
        <div class="col-6 form-group">
            <label for="txtCorreo">Cantidad:</label>
            <input type="" class="form-control" name="txtCorreo" id="txtCorreo" required value="<?php echo $cliente->correo ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtTelefono">Precio:</label>
            <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $cliente->telefono ?>">
        </div>
        <div class="col-12 form-group">
            <label for="txtFechaNac" class="d-block">Descripcion:</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea>
            <script>
                ClassicEditor
                    .create(document.querySelector('#txtDescripcion'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <div class="col-12 form-group py-5">
                <label for="" > Imagen: </label><br>
                <strong> <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png"> <br> </strong>
                <small> admitidos: .jpg, .jpeg, .png </small>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>

</script>
<?php include_once("footer.php"); ?>