<?php $url_base="http://localhost/proyecto-rectificadora/admin/";?>
<!doctype html>
<html lang="en">
    <head>
        <title>Administrador del sitio</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="nav navbar-nav">
                    <a class="nav-item nav-link active" href="<?php echo $url_base;?>index.php" aria-current="page"
                        >Administrador <span class="visually-hidden">(current)</span></a
                    >
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/servicios/">Servicios</a>
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/portafolio/">Portafolio</a>
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/repuestos/">Repuestos</a>
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/admin/">Usuarios</a>
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>login.php">Cerrar sesión</a>
                </div>
            </nav>
            
        </header>
        <main class="container"> 