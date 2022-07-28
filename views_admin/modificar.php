<?php include '../views_gral/header.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new Conexion();
        $proyecto= $conexion->consultar("SELECT * FROM `proyectos` where id=".$id);
     
    }
}
if($_POST){
    $id = $_SESSION['id_proyecto'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
    #la borramos de la carpeta 
    unlink("../assets/imagenes/".$imagen[0]['imagen']);
    #levantamos los datos del formulario
    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $url = $_POST['url'];
    #nombre de la imagen
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"../assets/imagenes/".$imagen);
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new Conexion();
    $sql = "UPDATE `proyectos` SET `nombre` = '$nombre_proyecto' , `imagen` = '$imagen', `descripcion` = '$descripcion', `url` = '$url' WHERE `proyectos`.`id` = '$id';";
    $id_proyecto = $conexion->ejecutar($sql);

    header("location:galeria.php?#seccion_tabla_proyec_existentes");
    die();
}
?>

<!-- SECCIÓN MODIFICAR PROYECTO EXISTENTE-->
<section class="page-section portfolio backgroundSeccProyec" id="seccion_modi_proyec">
    <div class="container">
                
        <h2 class="page-section-heading text-center text-uppercase text-white mb-0">MODIFICAR PROYECTO</h2>      

        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                </svg>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- LEEMOS EL PROYECTO A MODIFICAR -->
        <?php foreach($proyecto as $fila){ ?>
            <div class="row d-flex justify-content-center mt-4 mb-5">
                <div class="col-md-8 col-sm-12">
                    <div class="card style_card">
                        <div class="card-header style_card_header">
                            DATOS DEL PROYECTO
                        </div>
                        <div class="card-body">
                            <!--para recepcionar archivos uso enctype-->
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="nombre">Nombre del Proyecto</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Escriba aquí el nombre del proyecto..." value="<?php echo $fila['nombre']; ?>" required>
                                </div>
                                <br>
                                <div>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <label for="archivo">Imagen del Proyecto - Se actualizara al grabar los cambios</label>
                                        <br>
                                        <div class="d-flex justify-content-center align-item-center">
                                            <img class="img-fluid img_proyec_existente" src="../assets/imagenes/<?php echo $fila['imagen']; ?>" >
                                        </div>
                                    </div>
                                    <br>

                                    <label for="archivo">Seleccione un nueva Imagen si desea modificar la existente</label>
                                    <input id="archivo" name="archivo" type="file" class="form-control" value="<?php echo $fila['imagen'];?>">
                                </div>
                                <br>
                                <div>
                                    <label for="descripcion">Descripción del Proyecto</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" cols="30" rows="4" placeholder="Escriba aquí la descripción del proyecto..." required><?php echo $fila['descripcion'];?></textarea>
                                </div>
                                <br>
                                <div>
                                    <label for="url">Nombre del Proyecto</label>
                                    <input id="url" name="url" type="text" class="form-control" placeholder="Escriba aquí la url del proyecto..." value="<?php echo $fila['url']; ?>" required>
                                </div>
                                <br>
                                <div class="contenedor_btn_modi_proyec">
                                    <input class="btn btn-warning btn_modi_proyec" type="submit" value="MODIFICAR PROYECTO">
                                    <a class="btn btn-danger btn_volver" href="galeria.php?#seccion_tabla_proyec_existentes">VOLVER</a>
                                </div>
                            
                            </form>
                        </div> <!--cierra el body-->
                
                    </div><!--cierra el card-->
                        
                </div><!--cierra el col-->
            </div><!--cierra el row-->
        <?php } #cerramos la llave del foreach ?>
    </div><!--cierra el container--> 
</section>        

<?php include '../views_gral/footer.php'; ?>