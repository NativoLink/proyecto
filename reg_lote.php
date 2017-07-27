 <?php


 		$id_granja =$_GET['id_granja'];
 	    $fecha_inicioC =$_GET['fecha_inicioC'];
 	    $fecha_finalC =$_GET['fecha_finalC'];
 	    $fecha_inicioP = $_GET['fecha_inicioP'];
 	    $fecha_finalP = $_GET['fecha_finalP'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into lote  ( id_granja,fecha_inicioC,fecha_finalC,fecha_inicioP,fecha_finalP) VALUES ('$id_granja',' $fecha_inicioC' ,' $fecha_finalC',' $fecha_inicioP',' $fecha_finalP' )");
      ?>