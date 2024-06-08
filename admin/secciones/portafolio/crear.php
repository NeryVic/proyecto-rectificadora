<?php 
include("../../bd.php");
if($_POST){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";

    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen2=($imagen !="")?$fecha_imagen->getTimestamp()."_".$imagen:""; //

    $tmp_imagen = $_FILES["imagen"]["tmp_name"]; 
    if($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/".$nombre_archivo_imagen2);
    }

    $sentencia = $conexion->prepare("INSERT INTO `tabla_portfolio` (`ID`, `titulo`, `imagen`) 
    VALUES (NULL, :titulo, :imagen)");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen2); // Corregido el nombre del parámetro

    $sentencia->execute();

    $mensaje="Registro agregado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);
    exit();
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
