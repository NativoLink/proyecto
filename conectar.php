 <?php
  function conectar(){
  	error_reporting(0);
  	if (phpversion() > 50207) {
  	  	return $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');
  	}else{
	 	return $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', '');
  	}
  }

        

       
      ?>