 <?php


 		$nombre =$_GET['nombre'];
 	    $direccion =$_GET['direccion'];
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $db->query("Insert into granja  ( nombre,direccion) VALUES ('$nombre',' $direccion' )");
        header("location: mantenimiento.php")
      ?>