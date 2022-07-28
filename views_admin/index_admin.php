<?php include '../views_gral/header.php';?>
<?php $conexion = new Conexion();# es un objeto de tipo conexion,
      $proyectos= $conexion->consultar("SELECT * FROM `proyectos`"); 

      //Variable que utilizo dentro del foreach para
      //mostrar el modal correspondiente a cada proyecto.
      $num_proyecto = 0;        
?>

<!-- SECCIÓN PROYECTOS CARGADOS EN BASE DE DATOS-->
<section class="page-section portfolio backgroundSeccProyec" id="seccion_admin_proyec">
    <div class="container">
                
        <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Administrador de Portfolio Personal</h2>
        <h6 class="text-center text-uppercase text-white mt-3">Proyectos cargados en base de datos / <strong class="text-info">para ver + info hacerle click a la imágen</strong></h6>       

        <div class="divider-custom divider-light">
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
                    <img class="img-fluid" src="../assets/imagenes/<?php echo $proyecto['imagen'];?>" alt="Imagen Proyecto" />
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
                                                
                                        <img class="img-fluid rounded mb-5" src="../assets/imagenes/<?php echo $proyecto['imagen'];?>" alt="Imagen grande <?php echo $proyecto['nombre'];?>" />
                                                
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

<?php include '../views_gral/footer.php'; ?>