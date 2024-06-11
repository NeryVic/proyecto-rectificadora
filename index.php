<?php 
include("admin/bd.php");
    //seleccionar registros
    $sentencia=$conexion->prepare("SELECT * FROM `tabla_servicios`");
    $sentencia->execute();
    $lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //Seleccionar registros de portafolio
    $sentencia = $conexion->prepare("SELECT * FROM `tabla_portfolio`");
    $sentencia-> execute();
    $lista_portfolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resctificadora-Bassi</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- email-->
    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

    <script type="text/javascript">
    emailjs.init('xzHwatnVusi73_yJ_')
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./assets/images/logorb3.jpg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#producto">Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portafolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Servicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacto</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 data-aos="fade-left" class="text-uppercase text-white fw-semibold display-1">Rectificaciones Bassi</h1>
                    <h2 class="text-white text-uppercase fw-semibold" data-aos="fade-right">Bienvenidos</h2>
                    <h5 class=" mt-3 mb-4" data-aos="fade-right">+40 AÑOS DE EXPERIENCIA</h5>
                    <div data-aos="fade-up" data-aos-delay="50">
                        <a href="#about" class="btn btn-brand me-2">Dime mas</a>
                        <a href="#portfolio" class="btn btn-light ms-2">Nuestro trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="section-padding">
        <!-- bton de wssp-->
        <div class="wssp wssp-container">
              <a href="https://api.whatsapp.com/send?phone=5493704016066" target="_blank" class="wsspss">
                <img class="wsspp-img" src="./assets/images/wssp.png" alt="Contactar por whatsapp"  width="55" height="55">
              </a>
              </div>
                <!-- bton de wssp-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">¿Quiénes somos?</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="50">
                    <img src="./assets/images/rb1.jpg" alt="">
                </div>
                <div data-aos="fade-down" data-aos-delay="150" class="col-lg-5">
                    <h1>Rectificaciones-Bassi</h1>
                    <p class="mt-3 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit quo reiciendis ad.</p>
                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-mail-send-fill"></i>
                        </div>
                        <div>
                            <h5>+40 años en el rubro</h5>
                            <p>Lorem ipsum dolor sit amet consectetursci unde delectus omnis temporibus autem. Consequuntur magni reiciendis obcaecati ad sit soluta nobis at.!</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-user-5-fill"></i>
                        </div>
                        <div>
                            <h5>Cuidamos tu bolsillo</h5>
                            <p>Lorem ipsum dolor sit amet consectetursci unde delectus omnis temporibus autem.!</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="iconbox me-4">
                            <i class="ri-rocket-2-fill"></i>
                        </div>
                        <div>
                            <h5>somos un equipo</h5>
                            <p>Lorem ipsum dolor sit amet consectetursci unde delectus omnis temporibus autem.!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- PRODUCT -->
     <section id="producto" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">También contamos con respuestos</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem repellat nulla sit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-1.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 1</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-2.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 1</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-2.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 2</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-2.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 3</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-2.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 4</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="350">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-3.jpg" alt="">
                        </div>
                        <h5 class="mt-4">Producto 5</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quos magni!</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- COUNTER -->
     <section id="counter" class="section-padding">
        <div class="container text-center">
            
            <div class="row justify-content-center g-3">
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                    <h1 class="text-white display-4">+40 años</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">En el mercado</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                    <h1 class="text-white display-4">+3000</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Clientes satisfechos</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                    <h1 class="text-white display-4">+40</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Marcas</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Nuestro trabajo</h1>
                        <div class="line"></div>
                        <p>Te invitamos a ver algunos de nuestros trabajos realizados</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php foreach($lista_portfolio as $registros){;?>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                <h5 class="mt-4"><?php echo $registros["titulo"] ;?></h5>
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/img/portfolio/<?php echo $registros['imagen'] ?>" alt="">
                        </div>
                        <a href="./assets/img/portfolio/<?php echo $registros['imagen'] ?>" data-fancybox="gallery" class="iconbox"><i class="ri-search-2-line"></i></a>
                    </div>
                </div>
                <?php } ;?>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="section-padding border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Nuestros Servicios</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem repellat nulla sit.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <?php foreach($lista_servicios as $registros){;?>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                        <i class="ri-check-double-line"></i>
                            
                        </div>
                        <h5 class="mt-4 mb-3"><?php echo $registros["titulo"] ;?></h5>
                        <p><?php echo $registros["descripcion"] ;?></p>
                    </div>
                </div>
                <?php } ;?>
            </div>
                
    </section>

    <section class="section-padding bg-dark">
    <div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/1.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/2.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/3.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/4.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/5.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/6.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/7.png" alt="">
            </div>

            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/8.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/9.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/10.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/11.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/12.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/13.png" alt="">
            </div>
            <div class="slide">
                <img class="img-slide" src="./assets/images/slider/14.png" alt="">
            </div>
        </div>
    </div>

    </section>

    <!-- CONTACT -->
    <section class="section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 text-white fw-semibold">Contáctanos</h1>
                        <div class="line bg-white"></div>
                        <p class="text-white">Nuestro equipo esta encantado de escucharte</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
                <div class="col-lg-8">
                    <form id="contactForm" class="row g-3 p-lg-5 p-4 bg-white theme-shadow">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="from_name" id="from_name" placeholder="Ingresa tu Nombre *">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="apellido" placeholder="Apellido (opcional)">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Tu Mail *">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control" id="message" placeholder="Tu mensaje *"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                          <!--  <button class="btn btn-brand" id="submit_btn">Enviar mensaje</button> -->
                            <input class="btn btn-primary btn-xl text-uppercase " id="submit_btn" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

   

    <!-- FOOTER -->
    <footer class="bg-dark">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-3 col-sm-6">
                        <a href="#"><img src="./assets/images/logo-white.svg" alt=""></a>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, hic!</p>
                        <div class="social-icons">
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                            <a href="#"><i class="ri-instagram-fill"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">SERVICIOS</h5>
                        <div class="line"></div>
                        <ul>
                            <li><a href="#services">Planos</a></li>
                            <li><a href="#services">Rectificación de tapas de cilindros</a></li>
                            <li><a href="#services">Soldaduras</a></li>
                            <li><a href="#services">Rectificación de Blocks</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">CONTACT</h5>
                        <div class="line"></div>
                        <ul>
                            <li>Carlos Gardel</li>
                            <li>Telefono</li>
                            <li>El Colorado</li>
                            <li>Formosa</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">UBICACIÓN</h5>
                        <div class="line"></div>
                        <div id="map">
                        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3576.7744742297996!2d-59.37216428978408!3d-26.301410167842675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDE4JzA1LjEiUyA1OcKwMjInMTAuNSJX!5e0!3m2!1ses-419!2sar!4v1717787435035!5m2!1ses-419!2sar" width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row g-4 justify-content-between">
                    <div class="col-auto">
                        <p class="mb-0">© Copyright 2024 All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/contact.js"></script>
    
    
</body>

</html>