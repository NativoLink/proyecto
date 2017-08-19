   <?php
        include("../conectar.php");
        $sql="SELECT  from lote ";
        $db = conectar();
          $id_postura = $_GET['id_incubadora'];
          $query = $db->query($sql);
        
        foreach($db->query("SELECT * FROM postura where id_postura = '$id_postura'") 
          as $row) 
        {
          echo  trim($row['huevos_f']); 
         }
      ?>
