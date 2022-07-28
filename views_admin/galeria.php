<?php include '../views_gral/header.php'; ?>
<?php if($_POST){#si hay envio de datos, los inserto en la base de datos  

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
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`, `url`) VALUES (NULL, '$nombre_proyecto' , '$imagen', '$descripcion', '$url')";
    $id_proyecto = $conexion->ejecutar($sql);
     #para que no intente borrar muchas veces
     header("Location:galeria.php");
     die();

 }
 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new Conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("../assets/imagenes/".$imagen[0]['imagen']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:galeria.php");
         die();
 }

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        header("Location:modificar.php?modificar=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new Conexion();
  $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?> 

<!--ya tenemos un container en el header que cierra en el footer-->

<!-- SECCIÓN ABM PROYECTOS-->
<section class="page-section portfolio backgroundSeccProyec" id="seccion_abm_proyec">
    <div class="container">
                
        <h2 class="page-section-heading text-center text-uppercase text-white mb-0">ABM (ALTA-BAJA-MODIFICACION)</h2>
        <h6 class="text-center text-uppercase text-white mt-3">Dar de alta un proyecto nuevo / Dar de baja un proyecto existente / Modificar un proyecto existente </h6>       

        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                </svg>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- ALTA DE PROYECTO -->
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-8 col-sm-12">
                <div class="card style_card">
                    <div class="card-header style_card_header">
                        DATOS DEL NUEVO PROYECTO
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="galeria.php" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="nombre">Nombre del Proyecto</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Escriba aquí el nombre del proyecto..." required>
                            </div>
                            <br>
                            <div>
                                <label for="archivo">Imagen del Proyecto</label>
                                <input id="archivo" name="archivo" type="file" class="form-control" required>
                            </div>
                            <br>
                            <div>
                                <label for="descripcion">Descripción del Proyecto</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" cols="30" rows="4" placeholder="Escriba aquí la descripción del proyecto..." required></textarea>
                            </div>
                            <br>
                            <div>
                                <label for="url">Url del Proyecto</label>
                                <input id="url" name="url" type="text" class="form-control" placeholder="Escriba aquí la url del proyecto..." required>
                            </div>
                            <br>
                            <div> 
                                <input class="btn btn-success btn_enviar_proyec" type="submit" value="AGREGAR PROYECTO">
                            </div>
                        </form>
                    </div> <!--cierra el body-->
                </div><!--cierra el card--> 
            </div><!--cierra el col-->
        </div><!--cierra el row-->

        <!-- TABLA DE PROYECTOS EXISTENTES (BAJA-MODIFICACION) -->
        <div id="seccion_tabla_proyec_existentes">
            <h5 class="text-center text-uppercase text-white mt-5">TABLA DE PROYECTOS EXISTENTES</h5>
            <div class="divider-custom divider-light mt-2">
                <div class="divider-custom-line"></div>
            </div>    

            <div class="row d-flex justify-content-center mb-5">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-responsive responsiveTable bg-white">
                        <thead class="style_thead">
                            <tr class="text-center">
                                <th>NOMBRE</th>
                                <th>IMAGEN</th>
                                <th>DESCRIPCION</th>
                                <th>URL</th>
                                <th>ACCIONES</th>   
                            </tr>
                        </thead>
                        <tbody >
                            <?php #leemos proyectos 1 por 1
                            foreach($proyectos as $proyecto){ ?>
                        
                            <tr class="text-center">
                                <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                                <td data-titulo="Nombre:"><?php echo $proyecto['nombre'];?></td>
                                <td><img width="200" height="120" src="../assets/imagenes/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                                <td data-titulo="Descripción:" class="texto"><?php echo $proyecto['descripcion'];?></td>
                                <td data-titulo="Url:"><?php echo $proyecto['url'];?></td>
                                <td>
                                    <a name="modificar" id="modificar" class="btn btn-warning btn-sm px-3 btn_modificar" href="?modificar=<?php echo $proyecto['id'];?>"><i class="fas fa-pen fa-lg"></i></a>
                                    <a name="eliminar" id="eliminar" class="btn btn-danger btn-sm px-3 btn_eliminar" href="?borrar=<?php echo $proyecto['id'];?>"><i class="fas fa-times fa-lg"></i></a>
                                </td>
                            </tr>

                            <?php #cerramos la llave del foreach
                            } ?>
                        </tbody>
                    </table>
                </div><!--cierra el col-->  
            </div><!--cierra el row-->
        </div>
        
    </div><!--cierra el container--> 
</section>

<?php include '../views_gral/footer.php'; ?>