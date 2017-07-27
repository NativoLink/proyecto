 <?php
  function conectar(){
  	error_reporting(0);
  	if (phpversion() > 50207) {
  	  	return $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');
  	}else{
	 	return $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', '');
  	}
  }


  // FUNCIONES DE CONSULTA INDIVIDUAL RAPIDA
  function getGranja($id_granja){
  	// $sql= "SELECT * FROM granja WHERE id_granja='$id_granja' ";
		 // $query = mysql_query($sql);
   //   while($row =mysql_fetch_array($query)){
   //    echo $row[1];
   //   }

  }

        

       
      ?>