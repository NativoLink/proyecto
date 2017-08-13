
<!DOCTYPE html>
<html lang="en">



   <?php


error_reporting(0);
session_start();
if($_GET['cerrar']){session_destroy(); session_commit();}else{
   if($_POST){
   $usuario = $_POST['usuario'];
   $contrasena = $_POST['contrasena'];
          include("conectar.php");
          $db=conectar();
          $sql = "SELECT * FROM login where usuario ='$usuario' AND contrasena ='$contrasena'";
          // $query = mysql_query($sql);
          $stmt = $db->prepare($sql);
          $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC))  //VERSION PARA PHP DE LEONEL
          // if($row = mysql_fetch_array($query))
        {
            echo " <script>location.href='index.php'</script>";
            $_SESSION["id_login"]= $row['id_login'];
            $_SESSION["usuario"]= $row['usuario'];
            $_SESSION["permisos"]= $row['permisos'];


         }

         ?>
         <script>console.log("....")</script>
         <?php
    }else{
        if(isset($_SESSION["id_login"])){
            echo " <script>location.href='index.php'</script>";
        }
    }}
      ?>
    

   
<head>
        <title>C.A.C DASHBOARD</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="login.php" method="POST">
                 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                    <font color="#ffb448">
                        <center>
                         <h1>S.I.G Avicola </h1>
                        </center>
                    </font> 

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="text" placeholder="Nombre de usuario" name="usuario" />
                        </div> 
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" placeholder="Contraseña"  name="contrasena"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right">
                    <input type="submit" href="login.php" class="btn btn-success" value=""/> Iniciar sesion</span>
                </div>

            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Introduzca su dirección de correo electrónico a continuación y le enviaremos instrucciones de cómo recuperar su contraseña..</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="Correo electronico" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Volver a identificarse</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recuperar</a></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
