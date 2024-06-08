<?php 
include("../../bd.php");


//seleccionar registros
    $sentencia=$conexion->prepare("SELECT * FROM `tabla_portafolio`");
    $sentencia->execute();
    $lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);


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
                    <tr class="">
                        <td scope="row">1</td>
                        <td>Prueba</td>
                        <td>imagen.jpg</td>
                        <td>
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php"
                            role="button"
                            >Editar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php"
                            role="button"
                            >Eliminar</a
                        >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>


<?php include("../../templates/foother.php");?>