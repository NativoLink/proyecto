 <?php

		include("../conectar.php");

		$id_nave         =$_GET['id_nave'];
		$huevos_fertiles =$_GET['huevos_f'];
		$huevos_sucio    =$_GET['huevos_s'];
		$huevos_rotos    = $_GET['huevos_r'];
		$huevos_dobleY   = $_GET['huevos_d'];
		$fecha_reg       = $_GET['fecha_reg'];

      	$db = conectar();

        $db->query("Insert into postura  ( id_nave,huevos_f,huevos_s,huevos_r,huevos_d,fecha_reg) VALUES ('$id_nave',' $huevos_fertiles' ,' $huevos_sucio',' $huevos_rotos',' $huevos_dobleY',' $fecha_reg' )");
      ?>