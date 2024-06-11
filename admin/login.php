<?php 
include("./bd.php");

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

        <!-- Bootstrap CSS v5.2.1 -->
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
       
        
        <main>
        <div class="box">
            <div class="container">
                <div class="top-header">
                    <span>Bassi-Rectificaciones</span>
                    <header>INICIAR SESION</header>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Usuario">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Contraseña" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Iniciar Sesion">
                </div>

                <div class="bottom">
                    <div class="left">
                        <input type="checkbox" id="check">
                        <label for="check">Recordar</label>
                    </div>
                </div>
                
            </div>
        </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


