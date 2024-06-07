<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    // Recuperar los datos del ID seleccionado.
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tabla_portafolio WHERE ID = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $imagen = $registro['imagen'];
    $titulo = $registro['titulo'];
}

if ($_POST) {
    // Recepción de valores del formulario.
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    
    // Recepción de la nueva imagen si se sube una.
    $nuevaImagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $nombreArchivo = $imagen; // Mantener el nombre de la imagen existente por defecto.
    
    if ($nuevaImagen != "") {
        $fecha = new DateTime();
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];

        // Verificar si el directorio existe antes de intentar mover el archivo.
        $rutaDestino = "../../../assets/img/portafolio/";
        if (!is_dir($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        // Mover la nueva imagen a su destino.
        if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreArchivo)) {
            // Eliminar la imagen anterior si existe.
            if ($imagen != "" && file_exists($rutaDestino . $imagen)) {
                unlink($rutaDestino . $imagen);
            }
        } else {
            echo "Error al mover el archivo a su destino.";
            exit;
        }
    }
    
    // Actualización de los datos en la base de datos.
    $sentencia = $conexion->prepare("UPDATE tabla_portafolio SET  imagen = :imagen, titulo = :titulo WHERE ID = :id");
    $sentencia->bindParam(":imagen", $nombreArchivo);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    $mensaje = "Registro modificado exitosamente.";
    header("Location: index.php?mensaje=" . $mensaje);
    exit;
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">Editar producto del portafolio</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input value="<?php echo $txtID; ?>" readonly class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />
            </div>
        
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <br />
                <?php if ($imagen != ""): ?>
                    <img src="../../../assets/img/portafolio/<?php echo $imagen; ?>" width="75" height="75" alt="Imagen actual" />
                <?php endif; ?>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Título:</label>
                <input value="<?php echo $titulo; ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Título" />
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/foother.php"); ?>
