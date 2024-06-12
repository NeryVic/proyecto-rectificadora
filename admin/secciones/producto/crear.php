<?php 
include("../../bd.php");

if ($_POST) {
    
    // Recepción de valores del formulario.
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion']) ) ? $_POST['descripcion'] : "";
    $txtID = (isset($_POST['txtID']) ) ? $_POST['txtID'] : "";
    // Recepción de imagen
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    $fecha = new DateTime();
    $nombreArchivo = ($imagen != "") ? $fecha->getTimestamp() . "_" .$imagen: "";
    
    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "../../../assets/img/producto/".$nombreArchivo);
    }

    // Inserción de los datos en la base de datos.
    $sentencia = $conexion->prepare("INSERT INTO `tabla_repuestos` (`ID`, `imagen`, `titulo`, `descripcion`) 
    VALUES (NULL, :imagen, :titulo, :descripcion)");
    $sentencia->bindParam(":imagen", $nombreArchivo);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->execute();

    $mensaje = "Registro creado exitosamente.";
    header("Location: index.php?mensaje=" .$mensaje);
    exit;
}

include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">Producto/Repuesto</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="imagen" class="form-label">Imágen:</label>
                <input
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    placeholder="Imagen"
                    aria-describedby="fileHelpId"
                />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Título:</label>
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
                <label for="" class="form-label">Descripción:</label>
                <input
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Descripcion"
                />
                
            </div>
            

            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/foother.php");?>