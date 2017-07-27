
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Alimento</a> </div>
  <h1>Mantenimientos</h1>
  <div class="container-fluid"  >
        <div class="quick-actions_homepage">
          <ul class="quick-actions">
            <li class="bg_lb"> <a onclick="CargarAjax('contenido','mantenimiento.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span> Granja </a> </li>
            <li class="bg_lg"> <a onclick="CargarAjax('contenido','mantenimiento lote.php', '', 'GET');"  href="#"> <i class="icon-th-list"></i>lote</a> </li>
          <li class="bg_lo"> <a onclick="CargarAjax('contenido','mantenimiento nave.php', '', 'GET');"  href="#"> <i class="icon-th-list"></i> nave</a> </li>
            <li class="bg_ly"> <a onclick="CargarAjax('contenido','mantenimiento postura.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Postura</a> </li>
            <li class="bg_ls"> <a onclick="CargarAjax('contenido','mantenimiento salida.php', '', 'GET');" href="#"> <i class="icon-filter"></i>Salida</a> </li>
            <li class="bg_lr"> <a onclick="CargarAjax('contenido','mantenimiento alimento.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Alimento</a> </li>
            <li class="bg_lom"> <a onclick="CargarAjax('contenido','mantenimiento compra.php', '', 'GET');" href="#"> <i class="icon-money"></i>Compra</a> </li>
            <li class="bg_ll"> <a onclick="CargarAjax('contenido','mantenimiento incubadora.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Incubadora</a> </li>
            <li class="bg_le"> <a onclick="CargarAjax('contenido','mantenimiento nacimiento.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Nacimiento</a> </li>
             <li class="bg_lp"> <a onclick="CargarAjax('contenido','mantenimiento alimento consumido.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Alimento Consumido</a> </li>
          
          
          
          </ul>
        </div>
</div>
<div class="container-fluid">
<div id="gritter-notice-wrapper" style="display: none;"><div id="gritter-item-1" class="gritter-item-wrapper" style=""><div class="gritter-top"></div><div class="gritter-item"><div class="gritter-close" style="display: none;"></div><img src="img/demo/envelope.png" class="gritter-image"><div class="gritter-with-image"><span class="gritter-title">Guardado!</span></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div></div> 
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title" style="background:#f74d4d"> <span class="icon"> <i class="icon-align-justify" style="color:white"></i> </span>
          <h5 style="color:white">Alimento</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal" id="form_alimento">
            <div class="control-group">
              <label class="control-label">Nave:</label>
              <div class="controls">
                 <select type="number" class="span6" name="id_nave">
                <?php
        $sql="select  from lote ";
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM nave') as $row) 
        {

            ?>    
            <option value="<?php  echo $row['id_nave'] ; ?> ">

               <?php echo " Lote(".$row['id_lote'].") Nave(".$row['id_nave'].")" ;?> 

              </option>
              

                <?php

         }
            ?>
            </select>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Tipo</label>
              <div class="controls">
                <select  class="span6" name="tipo">
                  <option value="0">Seleccione...</option>
                  <option value="1">Iniciador Reproductora Granel</option>
                  <option value="2">Iniciador Reproductora saco</option>
                  <option value="3">Crecimiento Reproductora Granel</option>
                  <option value="4">Crecimiento Reproductora saco</option>
                  <option value="5">Pre Postura Reproductora Granel</option>
                  <option value="6">Pre Postura Reproductora Saco</option>
                  <option value="7">Postura fase 1 Granel</option>
                  <option value="8">Postura fase 1 Saco</option>
                  <option value="9">Postura fase 2 Granel</option>
                  <option value="10">Postura fase 2 Saco</option>
                  <option value="11">Postura fase 3 Granel</option>
                  <option value="12">Postura fase 3 Saco</option>
                  <option value="13">Alimento Gallo Granel</option>
                  <option value="14">Alimento Gallo Saco</option>
                  <option value="15">Alimento Gallo Prueba Granel</option>
                  <option value="16">Alimento Gallo Prueba Saco</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">cantidad:</label>
              <div class="controls">
                <input type="number"  class="span6" name="cantidad" />
              </div>
             
            <div class="form-actions">
            <a href="#" class="btn btn-success" onclick="CargarAjax_Form('reg_alimento.php','form_alimento','GET');limpiar()">Guardar </a>

            </div>
         <form >
      </div>
    </div>
  </div>
</div>
<script>
  function limpiar() {
   $(".span6").text("");
    $(".span6").val(""); 
    console.log("limpiar");
    $("#gritter-notice-wrapper").show(); 
  }
</script>


 <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Alimento Registrada</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                <th>ID Nave</th>
                  <th>Tipo</th>
                  <th>Cabtidad</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                          <?php

           
function moti ($mot){
         if ($mot ==1) {$motivo="Iniciador Reproductora Granel";}
         if ($mot ==2) {$motivo="Iniciador Reproductora saco";}
         if ($mot ==3) {$motivo="Crecimiento Reproductora Granel";}
          if ($mot==4) {$motivo="Crecimiento Reproductora saco";}
         if ($mot ==5) {$motivo="Pre Postura Reproductora Granel";}
         if ($mot ==6) {$motivo="Pre Postura Reproductora Saco";}
          if ($mot==7) {$motivo="Postura fase 1 Granel";}
         if ($mot ==8) {$motivo="Postura fase 1 Saco";}
         if ($mot ==9) {$motivo="Postura fase 2 Granel";}
          if($mot==10) {$motivo="Postura fase 2 Saco";}
         if ($mot==11) {$motivo="Postura fase 3 Granel";}
         if ($mot==12) {$motivo="Postura fase 3 Saco";}
          if($mot==13) {$motivo="Alimento Gallo Granel";}
         if ($mot==14) {$motivo="Alimento Gallo Saco";}
         if ($mot==15) {$motivo="Alimento Gallo Prueba Granel";}
         if ($mot==16) {$motivo="Aimento Gallo Prueba Saco";}
         
         echo $motivo;
       }
         



        $sql="select  from lote ";
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM  alimento') as $row) 
        {

        
?>
                                 

             <tr class="odd gradeX">


                  <td class="center">  <?php echo $row['id_nave'] ; ?> </td>
                  <td class="center">  <?php moti( $row['tipo'] ) ?> </td>
                  <td class="center">  <?php echo $row['cantidad'] ; ?> </td>


              
                </tr>
              

                <?php

         }


            ?>
               
               
              </tbody>
            </table>
          </div>
        
