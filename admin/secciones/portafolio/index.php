<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    //borrar dicho registro con el ID correspondiente.
    
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM `tabla_portafolio` WHERE id=:id ");

    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();
}

//seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tabla_portafolio`");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);


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
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="">
                    <?php foreach($lista_portafolio as $registros){;?>
                        <td scope="row"><?php echo $registros['ID'];?></td>
                        <td>
                        <img src="../../../assets/img/portafolio/<?php echo $imagen; ?>" width="75" height="75" alt="Imagen del portafolio"></td>
                        <td><?php echo $registros['titulo'];?></td>
                        <td>
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtID=<?php echo $registros['ID']; ?>"
                            role="button"
                            >Editar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registros['ID']; ?>"
                            role="button"
                            >Eliminar</a
                        >
                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/foother.php");?>