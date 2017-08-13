 <?php

		include("../conectar.php");

		$id_id_posturanave =$_GET['id_postura'];
		$huevos_encu       =$_GET['huevos_encu'];
		$huevos_recha      =$_GET['huevos_recha'];


      	$db = conectar();

        $db->query("Insert into postura  ( id_postura,huevos_encu,huevos_recha,fecha_reg) VALUES ('$id_postura',' $huevos_encu' ,' $huevos_recha',' $fecha_reg' )");
		?>	