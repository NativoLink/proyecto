<?php

    include("../conectar.php");
    $sql="SELECT  from salida ";
		$db = conectar();
		
	$id_nave = $_GET['id_nave'];
	$query   = $db->query($sql);
    
foreach($db->query("SELECT SUM(cantidad_h) as ch, SUM(cantidad_m) as cm FROM salida where id_nave = '$id_nave'  ") as $row) {
	echo $row['ch']."-".$row['cm'] ;
 }
?>