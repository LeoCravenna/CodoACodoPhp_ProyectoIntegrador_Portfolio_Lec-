<?php include './connection/conexion.php'; ?>
<?php $conexion = new Conexion();
    /*$sql = "SELECT * FROM `proyectos`";
    $datos = $conexion->consultar($sql);*/
    $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");

    //Variable que utilizo dentro del foreach para
    //mostrar el modal correspondiente a cada proyecto.
    $num_proyecto = 0;
?>
   
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>LC Portfolio - Proyecto Final - Codo a Codo</title>
        
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Uso Font Awesome para los iconos -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Fuentes de google -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- El archivo.css incluye Bootstrap v5.1.3 -->
        <link href="./assets/css/estilos.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- NAVEGACIÓN-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">LC Portfolio</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-danger text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Proyectos</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Acerca de mí</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contactarme</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link btn_ingresar py-3 px-0 px-lg-3 rounded" href="./views_admin/login.php">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- HEADER -->
        <header class="masthead text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                
                <img class="masthead-avatar mb-5" src="./assets/img/avatar.svg" alt="Caricatura Leonardo Cravenna" />
                
                <h1 class="masthead-heading text-uppercase mb-0">Leonardo Ezequiel Cravenna</h1>
                
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                
                <p class="masthead-subheading font-weight-light mb-0">Desarrollador Front-End</p>
            </div>
        </header>

        <!-- SECCIÓN PROYECTOS-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Proyectos</h2>
                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- LISTA DE PROYECTOS-->
                <div class="row justify-content-center">
                <!-- LEEMOS PROYECTOS DE A UNO -->
                <?php foreach($proyectos as $proyecto){ ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto sombraItemProyec" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $num_proyecto; ?>">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <h3><?php echo $proyecto['nombre'];?></h3>
                                    <p>VER <i class="fas fa-plus fa-1x"></i> INFO</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="./assets/imagenes/<?php echo $proyecto['imagen'];?>" alt="Imagen Proyecto <?php echo $proyecto['nombre'];?>" />
                        </div>
                    </div>

                    <!-- CADA PROYECTO TIENE SU MODAL -->
                    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $num_proyecto; ?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $num_proyecto; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="modal-body text-center pb-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                        
                                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?php echo $proyecto['nombre'];?></h2>
                                                        
                                                <div class="divider-custom">
                                                    <div class="divider-custom-line"></div>
                                                    <div class="divider-custom-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                                                            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="divider-custom-line"></div>
                                                </div>
                                                        
                                                <img class="img-fluid rounded mb-5" src="./assets/imagenes/<?php echo $proyecto['imagen'];?>" alt="Imagen grande <?php echo $proyecto['nombre'];?>" />
                                                        
                                                <p class="mb-3"><?php echo $proyecto['descripcion'];?></p>

                                                <p class="mb-4"><a class="btn btn-outline-secondary style_url_proyec" href="<?php echo $proyecto['url'];?>" target="_blank">VER DEMO DEL PROYECTO</a></p>
                                                        
                                                <button class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="fas fa-xmark fa-fw"></i>CERRAR
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $num_proyecto++; 
                    }
                ?>            
                </div>
                
            </div>
        </section>

        <!-- SECCIÓN ACERCA DE MÍ-->
        <section class="page-section2 bg-danger text-white mb-0" id="about">
            <div class="container">
                
                <h2 class="page-section2-heading text-center text-uppercase text-white">Acerca de mí</h2>
                
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <!--<i class="fas fa-star"></i>-->
                    <div class="divider-custom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- CONTENIDO DE LA SECCIÓN-->
                <div class="row">
                    <div class="col-lg-4 ms-auto">
                        <p class="lead">Me considero una persona versátil,pro-activa y positiva, con experiencia en análisis, desarrollo, testeo e implementación de sistemas.</p>
                        <p class="lead">Actualmente trabajo en el sindicato Ferroviario en la Oficina de Sistemas como programador Frontend, participo en la migración y desarrollo del Sistema Interno y App Mobile de la Unión Ferroviaria y de la Asociación Mutual Unión Ferroviaria.</p>
                    </div>
                    <div class="col-lg-4 me-auto">
                        <p class="lead2">Tecnologías y lenguajes utilizados:</p>
                        <ul class="list_technologies">
                            <li class="lead"><i class="fab fa-html5 lead3"></i> Html5</li>
                            <li class="lead"><i class="fa-brands fa-css3-alt lead3"></i> Css3</li>
                            <li class="lead"><i class="fa-brands fa-bootstrap lead3"></i> Bootstrap 5 (Framework)</li>
                            <li class="lead"><i class="fa-brands fa-js lead3"></i> JavaScript</li>
                            <li class="lead"><i class="fa-brands fa-php lead3"></i> Php</li>
                            <li class="lead"><i class="fa-brands fa-react lead3"></i> React</li>
                            <li class="lead"><i class="fa-solid fa-circle-notch lead3"></i> Ionic 5 (Android e IOS)</li>
                            <li class="lead"><i class="fa-brands fa-angular lead3"></i> Angular / TypeScript (Android e IOS)</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN CONTACTARME -->
        <section class="page-section" id="contact">
            <div class="container">
                
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contactarme</h2>
                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- FORMULARIO-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- SE USA SB FORMS PARA VALIDAR LOS CAMPOS -->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- NOMBRE COMPLETO -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Escriba su nombre..." data-sb-validations="required" />
                                <label for="name">Nombre</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es requerido.</div>
                            </div>
                            <!-- CORREO -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="nombre@ejemplo.com" data-sb-validations="required,email" />
                                <label for="email">Correo</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">El correo es requerido.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Correo no válido.</div>
                            </div>
                            <!-- N° TELÉFONO-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(011) 3434-5656" data-sb-validations="required" />
                                <label for="phone">Teléfono</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">El teléfono es requerido.</div>
                            </div>
                            <!-- MENSAJE-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Escriba su mensaje aquí..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Mensaje</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">El mensaje es requerido.</div>
                            </div>

                            <!-- SUBMIT EXITOSO -->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">El mensaje ha sido enviado con exito!</div>
                                </div>
                            </div>

                            <!-- SUBMIT ERROR -->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error al enviar el mensaje!</div>
                            </div>

                            <!-- BOTONES(SUBMIT/RESET) -->
                            <button class="btn btn-secondary btn-xl disabled" id="submitButton" type="submit">Enviar</button>
                            <!--<button class="btn btn-danger btn-xl" id="submitButton" type="reset">Borrar</button>-->
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- REDES SOCIALES-->
                    <div class="col-lg-12 mb-12 mb-lg-0">
                        <!--<h4 class="text-uppercase mb-4">Redes Sociales</h4>-->
                        <a class="btn btn-outline-light btn-social mx-1" href="#!">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://www.linkedin.com/in/leonardo-cravenna-b7871b87/">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://github.com/LeoCravenna?tab=repositories">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- COPYRIGHT -->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; LC Portfolio 2022</small></div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/scripts.js"></script>
        <!-- SB-FORMS PARA FORMULARIO -->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html> 