<?php
 include("../conectar.php");
  $db = conectar();
?>
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Salida</a> </div>
  <h1>Mantenimientos</h1>
  <div class="container-fluid"  >
        <div class="quick-actions_homepage">
          <ul class="quick-actions">
            <li class="bg_lb"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span> Granja </a> </li>
            <li class="bg_lg"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento lote.php', '', 'GET');"  href="#"> <i class="icon-th-list"></i>lote</a> </li>
            <li class="bg_lo"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento nave.php', '', 'GET');"  href="#"> <i class="icon-th-list"></i> nave</a> </li>
            <li class="bg_ly"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento postura.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Postura</a> </li>
            <li class="bg_ls"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento salida.php', '', 'GET');" href="#"> <i class="icon-filter"></i>Salida</a> </li>
            <li class="bg_lr"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento alimento.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Alimento</a> </li>
            <li class="bg_lom"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento compra.php', '', 'GET');" href="#"> <i class="icon-money"></i>Compra</a> </li>
            <li class="bg_ll"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento incubadora.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Incubadora</a> </li>
            <li class="bg_le"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento nacimiento.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Nacimiento</a> </li>
             <li class="bg_lp"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento alimento consumido.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Alimento Consumido</a> </li>
             <li class="bg_lt"> <a onclick="CargarAjax('contenido','mantenimiento/mantenimiento usuario.php', '', 'GET');" href="#"> <i class="icon-th-list"></i>Registro de Usuario</a> </li>
          
          
          
          </ul>
        </div>
</div>
<div class="container-fluid">
<div id="gritter-notice-wrapper" style="display: none;"><div id="gritter-item-1" class="gritter-item-wrapper" style=""><div class="gritter-top"></div><div class="gritter-item"><div class="gritter-close" style="display: none;"></div><img src="img/demo/envelope.png" class="gritter-image"><div class="gritter-with-image"><span class="gritter-title">Guardado!</span></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div></div>
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title" style="background:#2255a4"> <span class="icon"> <i class="icon-filter" style="color:white"></i> </span>
          <h5 style="color:white ">Salida</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal" id="form_salida">
            <div class="control-group">
              <label class="control-label">Nave:</label>
              <div class="controls">
              <select type="number" class="span6" name="id_nave" id='pos'>
                <?php
        $sql="select  from lote ";
        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM nave') as $row) 
        {

        
?>
                 <option value="<?php  echo $row['id_nave'] ; ?> " >

               <?php echo " Lote(".$row['id_lote'].") Nave(".$row['id_nave'].")" ;?>  

              </option>


              

                <?php

         }
            ?>
             <script type="text/javascript">

             $( "#cantidad_m[type=text]" ).change(function() {
                cm_input = $( "#cantidad_m" ).val();
                var ch = $( "#ch" ).val();
                var cm = $( "#cm" ).val();

                console.log(cm_input+'-'+cm);

                if(cm_input > cm){
                  $( "#cantidad_m" ).val(cm_input);
                }
                
              });
             function tcantidadMH(ch,cm){
                 $("#ch").val("Cant. Disponible"+ch);
                  $("#cm").val("Cant. Disponible"+cm);
             }
                $("#pos").change(function() {
                  console.log("cambiando");
                   x = $("#pos").val();
                   optionAjax2('filtros/salidasfiltradas.php?id_nave='+x, '', 'GET','ch','cm');
                 }); 
                </script>
             
            </script>
            </select>
            </div>
           
            <div class="control-group">
              <label class="control-label">Tipo</label>
              <div class="controls">
                 <select  class="span6" name="motivo">
                  <!-- <option value="0">Seleccione...</option> -->
                  <option value="1">Muerte</option>
                  <option value="2">Venta</option>
                  <option value="3">Transferencia</option>
                 </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nave a Transferir:</label>
              <div class="controls">
                <select type="number" class="span6" name="id_nave2">
                <?php
        $sql="select  from lote ";
        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM nave') as $row) 
        {

            ?>    
            
          
             
                <option  value="<?php echo $row['id_nave'] ; ?> ">
                 <?php echo $row['id_nave'] ; ?> 

              </option>
              

                <?php

         }
            ?>
            </select>
            </div>
            <div class="control-group">
            <label class="control-label">Hembras:</label>
            <div class="controls">
              <input type="text" class="span3" name="cantidad_h"  id="cantidad_h"  value="0" />
              <input type="text" disabled="" class="span3" value="0" id="ch"/>
            </div>
             </div>
             <div class="control-group">
             <label class="control-label">Machos:</label>
             <div class="controls">
               <input type="text" class="span3" value="0" id="cantidad_m" name="cantidad_m" />
               <input type="text" disabled="" class="span3"  value="0" id="cm"/>
             </div>
             </div>
              <div class="control-group">
        <?php  $fecha_ini = date('Y-m-d'); ?>
        <label class="control-label">Fecha:</label>
            <div class="controls">
            <div class="input-append date datepicker">
            <input value="<?php echo $fecha_ini; ?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_i" name="fecha_reg"></div>
            </div><div class="input-append date datepicker">
              
          </div>
            </div>
            <div class="form-actions">
               <a href="#" class="btn btn-success" onclick="CargarAjax_Form('registro/reg_salida.php','form_salida','GET');limpiar()">Guardar </a>             
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
            <h5>Salida Registrada</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                <th>ID Nave</th>
                  <th>Motivo</th>
                  <th>Nave a Transferir</th>
                  <th>Hembras</th>
                  <th>Machos</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                          <?php
        $sql="select  from lote ";
        $query = $db->query($sql);
        
        foreach($db->query('SELECT  * FROM  salida') as $row) 
        {

        
?>
                                 

             <tr class="odd gradeX">


                  <td class="center">  <?php echo $row['id_nave'] ; ?> </td>
                  <td class="center">  <?php moti( $row['motivo'] ); ?> </td>
                  <td class="center">  <?php echo $row['id_nave2'] ; ?> </td>
                  <td class="center">  <?php echo $row['cantidad_h'] ; ?> </td>
                  <td class="center">  <?php echo $row['cantidad_m'] ; ?> </td>





              
                </tr>
              

                <?php

         }
         function moti($mot){
         if ($mot ==1) {$motivo="Muerte";}
         if ($mot ==2) {$motivo="Venta";}
         if ($mot ==3) {$motivo="Transferencia";}
         echo $motivo;
       }
            ?>
               
               
              </tbody>
            </table>
          </div>
        
