 <?php


 		$id_lote =$_GET['id_lote'];
 	    $cantidad_h =$_GET['cantidad_h'];
 	    $cantidad_m =$_GET['cantidad_m'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into nave  ( id_lote,cantidad_h,cantidad_m) VALUES ('$id_lote',' $cantidad_h',' $cantidad_m')");
      ?>