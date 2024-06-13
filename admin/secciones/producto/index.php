<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    //borrar dicho registro con el ID correspondiente.
    $txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";
    // Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tabla_repuestos WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro_imagen  =  $sentencia->fetch(PDO::FETCH_LAZY);


// Verificar si la imagen existe y eliminarla
if(isset($registro_imagen["imagen"])){
    
    if(file_exists("../../../assets/img/producto/".$registro_imagen["imagen"])){
        unlink("../../../assets/img/producto/".$registro_imagen["imagen"]);
    }
}

// Eliminar el registro de la base de datos 
$sentencia = $conexion->prepare("DELETE FROM tabla_repuestos WHERE `tabla_repuestos`.`ID`=:ID");
$sentencia->bindParam(":ID", $txtID);
$sentencia->execute();
}

// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM tabla_repuestos");
$sentencia->execute();
$lista_producto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
</br>
<div class="card">
    <div class="card-header"> <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    ></div>
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
                        <th scope="col">Imágen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_producto as $registros){;?>
                <tr class="">
                        <td scope="row"><?php echo $registros['ID'];?></td>
                    <td>
                        <img width="75" height="75" src="../../../assets/img/producto/<?php echo $registros['imagen']; ?>" alt="Imagen del producto">
                        </td>
                        <td><?php echo $registros['titulo'];?></td>
                        <td><?php echo $registros['descripcion'];?></td>
                        <td scope="col">
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtID=<?php echo $registros['ID']; ?>"
                            role="button"
                            ><i class="ri-list-settings-line"></i></a
                        >
                        <a
                            name=""
                            id="btnEliminar"
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registros['ID']; ?>"
                            role="button"
                            onclick="return confirmarEliminacion();"
                            ><i class="ri-delete-bin-line"></i></a
                        >
                        <script>
                                    function confirmarEliminacion() {
                                        return confirm("¿Estás seguro de que deseas eliminar este registro?");
                                        }
                            </script>
                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
