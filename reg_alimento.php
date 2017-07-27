 <?php


 		$id_nave =$_GET['id_nave'];
 	    $tipo =$_GET['tipo'];
 	    $cantidad =$_GET['cantidad'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into alimento ( id_nave,tipo,cantidad) VALUES ('$id_nave',' $tipo' ,' $cantidad')");
      ?>