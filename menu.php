<?php
  include("conectar.php");

  function menu(){
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>C.A.C DASHBOARD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/fullcalendar.css">
<link rel="stylesheet" href="css/matrix-style.css">
<link rel="stylesheet" href="css/matrix-media.css">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery.gritter.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css">
<link id="load-css-0" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45/css/util/util.css">
<link id="load-css-1" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45/css/core/tooltip.css"><link id="load-css-0" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45/css/util/util.css"><link id="load-css-1" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45/css/core/tooltip.css">
<link rel="stylesheet" href="css/custom.css">
<script type="text/javascript" src="js/funciones.js"></script> 


</head>





<body>


<!--Header-part-->
<div id="header">
  <div class="logo"><a href="dashboard.html"></a></div>
</div>
<!--close-Header-part--> 

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> Mi perfil</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> Mis tareas</a></li>
        <li class="divider"></li>
        <li><a href="login.php"><i class="icon-key"></i> Cerrar Sesion</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text"><?php echo $_SESSION['usuario']." (ID-".$_SESSION['id_login'].")";?></span></a></li>

      <li class=""><a title="" href="#"><i class="icon icon-cog"></i>  <span class="text">Acerca de</span></a></a></li>
    <li class="">
    <a title="" href="login.php?cerrar=true">
    <i class="icon icon-share-alt"></i> 
    <span class="text">Cerrar Sesion</span></a>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
<div id="sidebar">
  <a href="#"  class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>


  <ul style="display: block;">

<!-- EJEMPLO PARA CARGAR OTRA VISTA ==================== // -->
    <li class="active"><a onclick="CargarAjax('contenido','General/graficas_content.php', 'archivo=postura', 'GET');"  href="#"><i class="icon icon-home"></i> <span>Tablas &amp; Graficas (General)</span></a> </li>


<li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>Tablas &amp; Graficas (Granjas)</span> <span class="label label-important"></span></a>
      <ul>
      <?php
        $sql="select * from granja ";
          // include("conectar.php");
          $db=conectar();
        $query = $db->query($sql);
        foreach($db->query('SELECT * FROM granja') as $row) {
      ?>

        <li><a href="#" onclick="CargarAjax('contenido','Granja/graficas_content.php', 'id_granja=<?php echo $row['id_granja'];?>&nombre_granja=<?php echo $row['nombre'];?>&archivo=postura', 'GET');"> <?php echo $row['nombre'];?></a></li>
        <?php }?>
        
       <li><a href="#" onclick="CargarAjax('contenido','comparacion/graficas_content.php?archivo=comparaciones', '', 'GET');">Comparacion</a></li>
        
      </ul>
    </li>
    <?php 
  if($_SESSION["permisos"] == 999){
?>
    <li> <a href="#" onclick="CargarAjax('contenido','mantenimiento/mantenimiento.php', '', 'GET');"><i class="icon-hdd"></i> <span>Mantenimiento</span></a> </li>
   
  <?php 
  }
?>
    <li> <a href="#" onclick="CargarAjax('contenido','complementos.php', '', 'GET');"><i class="icon-hdd"></i> <span>Complementos</span></a> </li>
   
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<script type="text/javascript" src="https://www.gstatic.com/charts/45/loader.js"></script><script type="text/javascript" src="https://www.gstatic.com/charts/45/loader.js"></script>

<script> 
//$(document).ready(function(){
  console.log("algo");
CargarAjax('contenido','General/graficas_content.php', 'archivo=comparaciones', 'GET');
//
</script>
<?php } ?>

<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>
<script type="text/javascript" src="libreriagooglechart.js"></script>
<!--end-Footer-part-->
