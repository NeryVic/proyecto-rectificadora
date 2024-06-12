<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    // Borrar registros
    $txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";

    // Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tabla_portfolio WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro_imagen  =  $sentencia->fetch(PDO::FETCH_LAZY);

    // Verificar si la imagen existe y eliminarla
    if(isset($registro_imagen["imagen"])){
        // $ruta_imagen = "../../../assets/img/portfolio/".$registro_imagen["imagen"];
         if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
             unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
         }
     }
      // Eliminar el registro de la base de datos 
    $sentencia = $conexion->prepare("DELETE FROM tabla_portfolio WHERE `tabla_portfolio`.`ID`=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}

// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM tabla_portfolio");
$sentencia->execute();
$lista_portfolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar registro</a
        >
        </div>
    <div class="card-body">
        <div
            class="table-responsive-sm"
        >
            <table
                class="table"
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Imágen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_portfolio as $registro){ ?>
                <tr class="">
                    <td><?php echo $registro['ID']; ?></td>
                    <td><?php echo $registro['titulo']; ?></td>
                <td>
                    <img width="50" height="50" src="../../../assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="Imagen del portafolio">
                    </td>
                        <td scope="col">
                            <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                            <a id="btnEliminar" href="index.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button" onclick="return confirmarEliminacion();">Eliminar</a>
                            <script>
                                    function confirmarEliminacion() {
                                        return confirm("¿Estás seguro de que deseas eliminar este registro?");
                                        }
                            </script>
                        </td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>


<?php include("../../templates/footer.php");?>