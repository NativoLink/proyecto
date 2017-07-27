 <?php


 		$id_nave =$_GET['id_nave'];
 		$motivo =$_GET['motivo'];
 		$id_nave2 =$_GET['id_nave2'];
 	    $cantidad_h =$_GET['cantidad_h'];
 	    $cantidad_m =$_GET['cantidad_m'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into salida  ( id_nave,motivo,id_nave2,cantidad_h,cantidad_m) VALUES ('$id_nave','$motivo','$id_nave2',' $cantidad_h',' $cantidad_m')");
      ?>