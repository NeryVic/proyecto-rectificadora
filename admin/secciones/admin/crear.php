<?php 
include("../../bd.php");
if($_POST){
    
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";


    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el usuario y la contraseña en la base de datos
    $sentencia = $conexion->prepare("INSERT INTO `tabla_admin` (`ID`, `usuario`, `password`) 
    VALUES (NULL, :usuario, :password)");

    $sentencia->bindParam(":usuario", $usuario);
    
    $sentencia->bindParam(":password", $password_hash);
    

    $sentencia->execute();

    $mensaje="Registro agregado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);


}



include("../../templates/header.php");
?>
<div class="card">
    <div class="card-header"><b>Crea usuario</b></div>
    <div class="card-body">
    <form action="" method="post">
    
    <div class="mb-3">
        <label for="" class="form-label">Nombre del usuario:</label>
        <input
            type="text"
            class="form-control"
            name="usuario"
            id="usuario"
            aria-describedby="helpId"
            placeholder="Nombre del usuario"
        />
    </div>
    
    
    <div class="mb-3">
        <label for="" class="form-label">Password:</label>
        <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="Password"
        />
    </div>
    <button
            type="submit"
            class="btn btn-success"
        >
            Agregar
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



<?php include("../../templates/footer.php");?>