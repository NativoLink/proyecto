 <?php

include("../conectar.php");
			$db        = conectar();
			$id_nave   =$_GET['id_nave'];
			$tipo      =$_GET['tipo'];
			$cantidad  =$_GET['cantidad'];
			$fecha_reg = $_GET['fecha_reg'];
        
        $db->query("Insert into alimento ( id_nave,tipo,cantidad,fecha_reg) VALUES ('$id_nave',' $tipo' ,' $cantidad',' $fecha_reg')");
      ?>