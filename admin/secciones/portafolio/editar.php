<?php
include("../../bd.php");
if(isset($_GET['txtID']) ){
    //Recuperar los datos del ID seleccionado.
    $txtID = (isset($_GET['txtID']) )? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tabla_portafolio WHERE ID = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO :: FETCH_LAZY);

    $titulo = $registro['titulo'];
    $imagen = $registro['imagen'];
}

if($_POST){
    //Recuperación de valores del formulario.
    $txtID = (isset($_POST['txtID']) )? $_POST['txtID'] : "";
    $titulo = (isset($_POST['titulo']) )? $_POST['titulo'] : "";
//Recepción de la nueva imagen, si se sube una.
$nuevaImagen = (isset($_FILES['imagen']['name']) ) ? $_FILES['imagen']['name'] : "";
$nombreArchivo = $imagen; //mantener el nombre de la imagen existente por defecto.
}
if($nuevaImagen != ""){
    $fecha = new DateTime();
    $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name'];
    $tmpImagen = $_FILES['imagen']['tmp_name'];
}

include("../../templates/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">Editar producto portafolio</div>
    <div class="card-body">
        <div class="mb-3">
            <label for="" class="form-label">ID:</label>
            <input
                type readonly="text"
                class="form-control"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="ID"
            />
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Título:</label>
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
            <label for="" class="form-label">Imágen:</label>
            <input
                type="file"
                class="form-control"
                name="imagen"
                id="imagen"
                placeholder="Imágen"
                aria-describedby="fileHelpId"
            />
        </div>
        
        
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/foother.php"); ?>
