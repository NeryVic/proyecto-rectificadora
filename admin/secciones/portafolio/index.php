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
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>Ejemplo</td>
                        <td>R1C2</td>
                        <td>Editar | Eliminar </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/foother.php");?>