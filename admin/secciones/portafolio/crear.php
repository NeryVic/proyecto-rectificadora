<?php include("../../templates/foother.php"); ?>
<?php 
include("../../bd.php");

if ($_POST) {
    // Recepción de valores del formulario.
    
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    
    // Recepción de imagen
    $fecha_imagen = new DateTime();
    $nombreImagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $_FILES['imagen']['name'] : "";
    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/portafolio/" . $nombreImagen);
    }
    
    // Inserción a la base de datos
    $sentencia = $conexion->prepare("INSERT INTO tabla_portafolio (titulo, imagen) VALUES (:titulo, :imagen)");
    
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":imagen", $nombreImagen);
    
    $sentencia->execute();
    $mensaje = "Registro creado exitosamente.";
    header("Location: index.php?mensaje=" . $mensaje);
    exit;
}

include("../../templates/header.php");
?> 
</br>
<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Título"
                />
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imágen:</label>
                <input
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    placeholder="Imágen"
                    aria-describedby="fileHelpId"
                />
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/foother.php"); ?>
