<?php 
session_start();
if ($_POST) {
    include("./bd.php");
    
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Seleccionar registros
    $sentencia = $conexion->prepare("SELECT * FROM tabla_admin WHERE usuario = :usuario");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_ASSOC);

    //usuario root predefinido
    $root = "root";
    $pass = "qwer1234";


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
                    <form method="POST" action="">
                        <div class="input-field">
                            <input type="text" class="input" placeholder="Usuario" name="usuario" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" placeholder="Contraseña" name="password" required>
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
</html>


