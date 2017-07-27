 <?php


 		$id_nave =$_GET['id_nave'];
 	    $huevos_fertiles =$_GET['huevos_f'];
 	    $huevos_sucio =$_GET['huevos_s'];
 	    $huevos_rotos = $_GET['huevos_r'];
 	    $huevos_dobleY = $_GET['huevos_d'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into postura  ( id_nave,huevos_f,huevos_s,huevos_r,huevos_d) VALUES ('$id_nave',' $huevos_fertiles' ,' $huevos_sucio',' $huevos_rotos',' $huevos_dobleY' )");
      ?>