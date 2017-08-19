 <?php

		include("../conectar.php");

		$id_postura   =$_GET['id_postura'];
		$huevos_encu  =$_GET['huevos_encu'];
		$huevos_recha =$_GET['huevos_recha'];
		
		$huevos_resi  = $_GET['huevos_resi'];
		$fecha_reg    = $_GET['fecha_reg'];



      	$db = conectar();

        $db->query("Insert into incubadora  
        	( id_postura,huevos_encu,huevos_recha,fecha_reg,huevos_resi) VALUES 
        	('$id_postura',' $huevos_encu' ,' $huevos_recha',' $fecha_reg','$huevos_resi')");
		?>	