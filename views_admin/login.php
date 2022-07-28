<?php ob_start(); ?>
<?php session_start();
    #validar datos
    if ($_POST){
      #conexion a la base #mail #contraseña #es_admin s o n 
      /*SELECT es_admin FROM usuarios WHERE mail="" and contraseña = "";*/
        if( ($_POST['email']=="administrador") && ($_POST['pass']=='cac') ){
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']='S';
          #redirecciono porque ingreso ok 
          header("location:index_admin.php");
          die();
         // exit;
        }else{
           echo '<script> alert("Usuario y/o Contraseña incorrecta");</script>';
           header("location:login.php");
           die();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Crud LC Portfolio</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico" />
    <link href="../assets/css/estilos_login.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Crud PortFolio</h2>
                <form action="login.php" method="post">

                    <input type="text" name="email" id="email" class="field" placeholder="Usuario" required>
                    <input type="password" name="pass" id="subject" class="field" placeholder="Password" required>
                   
                    <input type="submit" value="Ingresar" class="btn">
                    <a href="../index.php" class="btn_volver">volver al portfolio</a>

                </form>
        </div>
    </div>
</body>
</html>