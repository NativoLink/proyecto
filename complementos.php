
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Lotes</a> </div>
  <h1>Lotes Activo</h1>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Lotes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="span6">Crianza</th>
                  <th class="span6">Produccion</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>
                     <?php
        $sql="select  from lote ";
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $query = $db->query($sql);
        
         foreach($db->query('SELECT * FROM lote' ) as $row) {
         foreach($db->query('SELECT * FROM Granja where id_granja = "'.$row['id_granja'].'"' ) as $row1) {
        
           
?>
                
             <tr class="odd gradeX">


                  <td class="center">  <?php   echo $row1['nombre']."-"." Lote(".$row['id_lote'].") "; ?> </td>

                    <?php 
                   if($row['estado']=="p"){
                          $estado="f";
                          $clase = "btn-warnning";
                           $status ="Produccion";
                           $state= "Inicio";
                      }else if ($row['estado']=="f") {
                          $estado ="ff";
                          $clase = "btn-success";
                          $status ="Final";
                          $state= "Final";
                        }else{
                          $estado ="p";
                          $clase = "";
                          $status ="Crianza";
                          $state= "na";

                          } ?>

                  <td><a href="#" title="<?php echo $state;?>  " class="btn <?php echo $clase;?>" onclick="CAjax('pasaraproduccion.php','id_lote=<?php echo $row['id_lote'];?>&estado=<?php echo $estado;?>&fecha=<?php echo "2017-07-07" ?>','GET');">X</a> <?php echo $status;?>  
                    
                

                  </td>
                </tr>
                

               <?php 
                  
          
            

         }  }
            ?>
                  </td>
                  <td></td>
                 
                </tr>
              </tbody>
            </table>
          </div>
        </div>
       