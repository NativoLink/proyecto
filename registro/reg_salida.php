 <?php
	include("../conectar.php");
	$db = conectar();

	$id_nave    =$_GET['id_nave'];
	$motivo     =$_GET['motivo'];
	$id_nave2   =$_GET['id_nave2'];
	$cantidad_h =$_GET['cantidad_h'];
	$cantidad_m =$_GET['cantidad_m'];
	$fecha_reg  = $_GET['fecha_reg'];

	$db->query("Insert into salida  ( id_nave,motivo,id_nave2,cantidad_h,cantidad_m,fecha_reg) VALUES ('$id_nave','$motivo','$id_nave2',' $cantidad_h',' $cantidad_m',' $fecha_reg')");
?>