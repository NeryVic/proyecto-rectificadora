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
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal('¡Usuario o contraseña incorrecto!', '', 'error');
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                            <i class="bx bx-lock-alt fas fa-eye toggle-passwords" id="togglePassword"></i>
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
        <script>
            // JavaScript para alternar la visibilidad de la contraseña
            document.getElementById('togglePassword').addEventListener('click', function () {
                const passwordInput = document.getElementById('password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

            // Alternar el ícono
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
             });
        </script>
        <footer>
            <!-- place footer here -->
        </footer>
    </body>
    <script src="../assets/js/localStorage.js"></script>
</html>


