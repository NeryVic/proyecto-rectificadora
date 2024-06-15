<?php
    include("../../bd.php");
    
    if(isset($_GET['txtID'])){
        //borrar dicho registro con el ID correspondiente.
        
        $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("DELETE FROM `tabla_servicios` WHERE id=:id ");
    
        $sentencia->bindParam(":id",$txtID);
    
        $sentencia->execute();
    }
    
    //seleccionar registros
    $sentencia=$conexion->prepare("SELECT * FROM `tabla_servicios`");
    $sentencia->execute();
    $lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
include("../../templates/header.php");?> 
<br/>
<div class="card">
    <div class="card-header">
    <a
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
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista_servicios as $registros){;?>    
            <tr class="">
                    <td scope="row"><?php echo $registros['ID'];?></td>
                    <td scope="row"><?php echo $registros['titulo'];?></td>
                    <td scope="row"><?php echo $registros['descripcion'];?></td>
                    <td>
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
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registros['ID']; ?>"
                            role="button"
                            onclick="return confirmarEliminacion()"
                            ><i class="ri-delete-bin-line"></i></a
                        >
                        <script>
                                    function confirmarEliminacion() {
                                        return confirm("¿Estás seguro de que deseas eliminar este registro?");
                                        }
                            </script>
                    </td>
                </tr>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>