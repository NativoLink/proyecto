 <?php
	include("../conectar.php");
	$db = conectar();

	$id_lote =$_GET['id_lote'];
    $cantidad_h =$_GET['cantidad_h'];
    $cantidad_m =$_GET['cantidad_m'];

	$db->query("Insert into nave  ( id_lote,cantidad_h,cantidad_m) VALUES ('$id_lote',' $cantidad_h',' $cantidad_m')");
?>