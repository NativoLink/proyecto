 <?php

	include("../conectar.php");
	$db         = conectar();
	$id_nave    =$_GET['id_nave'];
	$cantidad_h =$_GET['cantidad_h'];
	$cantidad_m =$_GET['cantidad_m'];
	$fecha_reg  = $_GET['fecha_reg'];

        $db->query("Insert into compra  ( id_nave,cantidad_h,cantidad_m,fecha_reg) VALUES ('$id_nave',' $cantidad_h',' $cantidad_m',' $fecha_reg')");
      ?>