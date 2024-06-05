<?php 
include("../../bd.php");
if($_POST){
    print_r($_POST);
    print_r($_FILES);
    //recepcion de valores del formulario.
    $titulo =(isset($_POST['titulo']) ) ?$_POST['titulo']:"" ;
    $descripcion =(isset($_POST['descripcion']) ) ?$_POST['descripcion']:"";
    $sentencia=$conexion->prepare("INSERT INTO `tabla_portafolio` (`ID`,`titulo`,`descripcion`) 
    VALUES (NULL, :titulo, :descripcion);");
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->execute();
    
    $mensaje="Registro creado exitosamente.";
    header("Location:index.php?mensaje=".$mensaje);
}


include("../../templates/header.php");?> 

<div class="card">
    <div class="card-header">Produto del portafolio</div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

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

<div class="mb-3">
    <label for="" class="form-label">Descripción:</label>
    <input
        type="text"
        class="form-control"
        name="descripcion"
        id="descripcion"
        aria-describedby="helpId"
        placeholder="Descripción"
    />
    
</div>
<button
            type="submit"
            class="btn btn-success"
        >
            Agregar
        </button>
        
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="index.php"
            role="button"
            >Cancelar</a
        >
</form>

        
    </div>
    <div class="card-footer text-muted"></div>
</div>






<?php include("../../templates/foother.php");?>