<?php 
ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");

include '../connection/conexion.php';

session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
if ( isset( $_SESSION['usuario'] )!='Admin'){
    header("location:../views_admin/login.php");
    die();
}
 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Crud LC Portfolio - Proyecto Final - Codo a Codo</title>
        
        <link rel="icon" type="image/x-icon" href="../favicon.ico" />
        <!-- Uso Font Awesome para los iconos -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Fuentes de google -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- El archivo.css incluye Bootstrap v5.1.3 -->
        <link href="../assets/css/estilos.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <!--<div class="container-fluid">-->
        <!-- NAVEGACIÓN-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Crud LC Portfolio</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-danger text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../views_admin/index_admin.php">
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/igpbsrza.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#FFFFFF"
                                    style="width:25px;height:25px;">
                                </lord-icon>
                                Ver proyectos
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../views_admin/galeria.php">
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/stxtcyyo.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#FFFFFF"
                                    style="width:25px;height:25px">
                                </lord-icon>
                                Abm
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../connection/cerrar.php">    
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/dxjqoygy.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#ffffff,secondary:#ffffff"
                                    stroke="100"
                                    style="width:27px;height:27px">
                                </lord-icon>
                                Cerrar Sesión de User: <span><?php echo $_SESSION['usuario']; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>