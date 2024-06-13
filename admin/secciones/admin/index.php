<?php 
include("../../bd.php");

// Borrar registros
if (isset($_GET['txtID'])) {
    $txtID = (isset ($_GET['txtID']) )? $_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM tabla_admin WHERE ID = :ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}

// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM tabla_admin");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<script>
    function mostrarOjito(element) {
        const passField = element.previousElementSibling;
        if (passField.type === 'password') {
            passField.type = 'text';
        } else {
            passField.type = 'password';
        }
    }
</script>
</br>
<div class="card">
    <div class="card-header"><a href="crear.php" class="btn btn-primary" role="button">Agregar registro</a></div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_usuarios as $registro) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['usuario']; ?></td>
                        <td>
                            <input type="password" id="pw<?php echo $registro['ID']; ?>" value="<?php echo $registro['password']; ?>" readonly>
                            <span style="cursor: pointer;" onclick="mostrarOjito(this)">👁️</span>
                        </td>
                        <td scope="col">
                            <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button"><i class="ri-list-settings-line"></i></a>
                            <a href="index.php?txtID=<?php echo $registro['ID']; ?>" onclick="return confirmarEliminacion()"  class="btn btn-danger" role="button"><i class="ri-delete-bin-line"></i></a>                        
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
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
