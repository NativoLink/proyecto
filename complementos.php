<?php
 include("conectar.php");
  $db = conectar();
?>
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
                  <th class="span6"></th>
                   <th class="span6">Edad</th>
                  <th class="span6"></th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>
<?php

        function calcular_semanas($fecha1){

          $datetime1 = new DateTime($fecha1);
          $datetime2 = new DateTime(date('Y-m-d'));
          $interval = $datetime1->diff($datetime2);

          // return $fecha1;
          return floor(($interval->format('%a') / 7)) . ' semanas con '
               . ($interval->format('%a') % 7) . ' días';

          }


        $sql="select  from lote ";
        $query = $db->query($sql);
        
         foreach($db->query('SELECT * FROM lote' ) as $row) {
         foreach($db->query('SELECT * FROM Granja where id_granja = "'.$row['id_granja'].'"' ) as $row1) {
        
           
?>
                
             <tr class="odd gradeX">


                  <td class="center">  <?php   echo $row1['nombre']."-"." Lote(".$row['id_lote'].") "; ?> </td>

                  <?php
                    $edad = calcular_semanas($row['fecha_inicioC']);

                  ?>
                  <td class="center"> <?php   echo $edad;?></td>

                    <?php 
                   if($row['estado']=="p"){
                          $estado="f";
                          $clase = "btn-warnning";
                           $status ="Activo";
                           $state= "Inicio";
                      }else if ($row['estado']=="f") {
                          $estado ="ff";
                          $clase = "btn-success";
                          $status ="Final";
                          $state= "Final";
                        }else{
                          $estado ="p";
                          $clase = "";
                          $status ="Activo";
                          $state= "na";

                        }
                  if ($row['estado']==""){
                          $estado ="f";
                          $clase = "";
                          $status ="Activo";
                          $state= "na";


                    }?>

                  <td><a href="#" title="<?php echo $state;?>  " class="btn <?php echo $clase;?>" onclick="CAjax('pasarProduccion.php','id_lote=<?php echo $row['id_lote'];?>&estado=<?php echo $estado;?>&fecha=<?php echo "2017-07-07" ?>','GET');CargarAjax('contenido','complementos.php', '', 'GET');">X</a> <?php echo $status;?> 


                    
                

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
       