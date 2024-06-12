<?php 
include("../../bd.php");
$nuevaImagen = ""; //Inicializa la variable nueva imagen.
$titulo = "";
$descripcion = "";
if (isset($_GET['txtID'])) {
    // Recuperar los datos del ID seleccionado.
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tabla_repuestos WHERE ID = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
//Asignar los valores del registro a las variables
    $imagen = $registro['imagen'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
}

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    // Recuperar de valores del formulario.
    $txtID =$_POST['txtID'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    // Recepción de la nueva imagen si se sube una.
    if(isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])){
    $nuevaImagen = $_FILES['imagen']['name'];
    $nombreArchivo = date("YmdHis") . "_". $nuevaImagen;
    move_uploaded_file($tmpImagen, "../../../assets/img/producto/" . $nombreArchivo);
//Eliminar imagen anterior si existe
if(file_exists("../../../assets/img/producto/". $imagen)){
    unlink("../../../assets/img/producto". $imagen);
}

//Actualizar la tabla con la nueva imagen
$sentencia = $conexion->prepare("UPDATE `tabla_repuestos` SET imagen=:imagen WHERE ID=:ID");
$sentencia->bindParam(":imagen", $nombreArchivo);
$sentencia->bindParam(":ID", $txtID);
$sentencia->execute();
    }
    
    // Actualización de los datos en la base de datos.
    $sentencia = $conexion->prepare("UPDATE `tabla_repuestos` SET titulo = :titulo, descripcion = :descripcion WHERE ID = :id");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    
    $mensaje = "Registro modificado exitosamente.";
    header("Location: index.php?mensaje=" . $mensaje);
    exit;
}


include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">Editar producto</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input value="<?php echo $txtID; ?>" readonly class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />
            </div>
        
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <br />
                    <img width="50" height="50" src="../../../assets/img/producto/ <?php echo $imagen; ?>" alt="Imagen actual">

                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input value="<?php echo $titulo; ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Descripción" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input value="<?php echo $descripcion; ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción" />
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/foother.php");?>