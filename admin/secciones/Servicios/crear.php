<?php
include("../../bd.php");
if($_POST){
    
    //recepcion de valores del formulario.
    $titulo =(isset($_POST['titulo']) ) ?$_POST['titulo']:"" ;
    $descripcion =(isset($_POST['descripcion']) ) ?$_POST['descripcion']:"";
    $sentencia=$conexion->prepare("INSERT INTO `tabla_servicios` (`ID`,`titulo`,`descripcion`) 
    VALUES (NULL, :titulo, :descripcion);");
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->execute();
    
    $mensaje="Registro modificado exitosamente.";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">Crear servicios</div>

    <div class="card-body">
        
    <form action="" method="post">
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
            <label for="descripcion" class="form-label">Descripción:</label>
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