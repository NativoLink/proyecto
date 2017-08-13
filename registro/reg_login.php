 <?php


    include("../conectar.php");
	$db = conectar();
	
	$usuario    =$_GET['usuario'];
	$contrasena =$_GET['contrasena'];
	$permisos   =$_GET['permisos'];
	

    $db->query("Insert into login  ( usuario, contrasena, permisos) 
    	VALUES ('$usuario',' $contrasena','$permisos' )");
    header("location: mantenimiento.php")
  ?>