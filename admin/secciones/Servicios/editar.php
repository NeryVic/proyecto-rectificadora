<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    //recuperar los datos del ID correspondiente(seleccionado).
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tabla_servicios WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_ASSOC);

    $titulo =$registro['titulo'];
    $descripcion =$registro['descripcion'];
}
if($_POST){
    
    //recepcion valores del formulario.
    $txtID =(isset($_POST['txtID']) ) ?$_POST['txtID']:"" ;
    $titulo =(isset($_POST['titulo']) ) ?$_POST['titulo']:"" ;
    $descripcion =(isset($_POST['descripcion']) ) ?$_POST['descripcion']:"";
    
    $sentencia=$conexion->prepare("UPDATE tabla_servicios
    SET titulo=:titulo,
    descripcion=:descripcion 
    WHERE id=:id ");
    
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    
    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();
    
    $mensaje="Registro modificado exitosamente.";
    header("Location:index.php?mensaje=".$mensaje);
}


include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">Editar la información de servicios</div>

    <div class="card-body">
        
    <form action="" method="post">
        <div class="mb-3">
            <label for="txtID" class="form-label">ID:</label>
            <input
                readonly value="<?php echo$txtID;?>"
                type="text"
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
                value="<?php echo $titulo;?>"
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
                value="<?php echo $descripcion;?>"
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
            Actualizar
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