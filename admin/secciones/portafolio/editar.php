<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']) ) ?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tabla_portafolio WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    $txtID =$registro['ID'];
    $imagen =$registro["imagen"];
    $descripcion =$registro['descripcion']; 

}
if($_POST){
    print_r($registro);

}
include("../../templates/header.php");?> 
<div class="card">
    <div class="card-header">Editar producto del portafolio</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input
                    value="<?php echo $txtID;?>"
                    readonly="text"
                    class="form-control"
                    name="txtID"
                    id="txtID"
                    aria-describedby="helpId"
                    placeholder="ID"
                />

            </div>
            
        
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <?php echo $imagen;?>
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

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../templates/foother.php");?>