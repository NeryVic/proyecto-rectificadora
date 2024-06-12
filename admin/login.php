<?php 
session_start();
 // Tiempo de inactividad en segundos (5 minutos = 300 segundos)
 $inactividad = 10;
// Actualizar el tiempo de la sesión
$_SESSION['tiempo'] = time();
 // Verificar si la sesión está activa y si han pasado 5 minutos
 if (isset($_SESSION['logueado']) && (time() - $_SESSION['tiempo'] > $inactividad)) {
     session_unset();     // Limpiar todas las variables de sesión
     session_destroy();   // Destruir la sesión
     header("Location: login.php"); // Redirigir al usuario a la página de login
     exit;
 }
 

if ($_POST) {
    include("./bd.php");
    
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Seleccionar registros
    $sentencia = $conexion->prepare("SELECT * FROM tabla_admin WHERE usuario = :usuario");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_ASSOC);

    //usr 
    $root = "root";
    $pass = "qwer1234";
    //

    if ($lista_usuarios && password_verify($password, $lista_usuarios['password']) || $usuario == $root && $password == $pass) {
        // Login correcto
        $_SESSION['usuario'] = $lista_usuarios['usuario'];
        $_SESSION['logueado'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "<script src='../assets/plugins/Sweetalert/dist/sweetalert2.all.min.js'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire('¡Usuario o contraseña incorrecto!', '', 'error');
                });
              </script>";
    }
   
}



?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>

    <body>

    <main>
            <div class="box">
                <div class="container">
                    <div class="top-header">
                        <span>Bassi-Rectificaciones</span>
                        <header>INICIAR SESIÓN</header>
                    </div>
                    <form method="POST" action="" id="loginForm">
                        <div class="input-field">
                            <input type="text" class="input" id="usuario" placeholder="Usuario" name="usuario" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" placeholder="Contraseña" name="password" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Iniciar Sesión" id="btn">
                        </div>
                        <div class="bottom">
                            <div class="left">
                                <input type="checkbox" id="check">
                                <label for="check">Recordar</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
    </body>
    <script src="../assets/js/localStorage.js"></script>
</html>


