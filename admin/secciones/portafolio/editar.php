<?php
include("../../bd.php");
$nuevaImagen = ""; // Inicializa la variable $nuevaImagen
$titulo = ""; 
if(isset($_GET['txtID'])){
    // Recuperar los datos del ID correspondiente
    $txtID = $_GET['txtID'];      
    $sentencia = $conexion->prepare("SELECT * FROM `tabla_portfolio` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $titulo = $registro['titulo']; 
    
    $imagen = $registro['imagen'];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recuperar los datos del formulario
    $txtID = $_POST['txtID'];
    $titulo = $_POST['titulo']; 

    // Verificar si se ha subido una nueva imagen
    if(isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])){
        $nuevaImagen = $_FILES["imagen"]["name"];
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo_imagen = date("YmdHis") . "_" . $nuevaImagen;
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/" . $nombre_archivo_imagen);

        // Eliminar imagen anterior si existe
        if(file_exists("../../../assets/img/portfolio/" . $imagen)){
            unlink("../../../assets/img/portfolio" . $imagen);
        }
        
        // Actualizar la tabla con la nueva imagen
        $sentencia = $conexion->prepare("UPDATE `tabla_portfolio` SET imagen=:imagen WHERE ID=:ID");
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    }

    // Actualizar los otros campos en la tabla
    $sentencia = $conexion->prepare("UPDATE `tabla_portfolio` SET titulo=:titulo WHERE ID=:ID");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Redirigir después de la actualización
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}

include("../../templates/header.php"); ?>
<br/>

<div class="card">
    <div class="card-header">Editar producto portafolio</div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
            <label for="txtID" class="form-label">ID:</label>
            <input
                readonly value="<?php echo$txtID;?>"
                class="form-control"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="ID"
            />
        </div>
        
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input
                type="text"
                value="<?php echo $titulo; ?>"
                class="form-control"
                name="titulo"
                id="titulo"
                aria-describedby="helpId"
                placeholder="Título"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Imágen:</label>
            <img width="75" height="75" src="../../../assets/img/portfolio/<?php echo $imagen; ?>" alt="Imagen actual">
            <input
                type="file"
                class="form-control"
                name="imagen"
                id="imagen"
                placeholder="Imágen"
                aria-describedby="fileHelpId"
            />
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
        
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php"); ?>
