 <?php
	include("../conectar.php");
	$db = conectar();

	$id_incubadora =$_GET['id_incubadora'];
	$cantidad      =$_GET['cantidad'];
	$fecha_reg     =$_GET['fecha_reg'];

	$db->query("Insert into nacimiento ( id_incubadora,cantidad,fecha_reg) VALUES ('$id_incubadora',' $cantidad',' $fecha_reg')");
?>