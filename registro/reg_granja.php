 <?php


    include("../conectar.php");
	$db = conectar();
	
	$nombre    =$_GET['nombre'];
	$direccion =$_GET['direccion'];
	$fecha_reg =$_GET['fecha_reg'];
	$fecha = explode("-",$fecha_reg);
	$fecha_r = $fecha[0]."-".$fecha[1]."-".$fecha[2]." 00:00:00";

    $db->query("Insert into granja  ( nombre,direccion,fecha_reg) 
    	VALUES ('$nombre',' $direccion','$fecha_r' )");
    header("location: mantenimiento.php")
  ?>