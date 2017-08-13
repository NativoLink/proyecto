<?php
 include("../conectar.php");
  $db = conectar();
?>

<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Lote</a> </div>
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
        <div class="widget-title" style="background: #28b779;"> <span class="icon"> <i class="icon-align-justify" style="color:white"></i> </span>
          <h5 style="color: white">Lote</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal" id="form_lote">
            <div class="control-group">
              <label class="control-label">Granja:</label>
              <div class="controls">
              
               <select type="number"  class="span6" name="id_granja" >
                <?php
        $sql="select  from lote ";
        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM granja') as $row) 
        {

        
?>
                  
                   <option value=" <?php echo $row['id_granja'] ; ?> ">

               <?php echo $row['nombre']."-".$row['id_granja'] ; ?> 

              </option>
              

                <?php

         }
            ?>
            </select  >
            </div>
         <div class="control-group">
              <label class="control-label">Fecha Inicio</label>
              <div class="controls">
                <input type="date"  data-date-format="dd-mm-aaaa" class="datepicker span6" name="fecha_inicioC"/> 
                <span class="help-block">(dia-mes-año)</span> </div>
            </div>

           <!--    <div class="control-group">
              <label class="control-label">Finalizacion Crianza</label>
              <div class="controls">
                <input type="date"  data-date-format="dd-mm-aaaa" class="datepicker span6" name="fecha_finalC"/>
                <span class="help-block">(dia-mes-año)</span> </div>

           <div class="control-group">
              <label class="control-label">Inicio Produccion</label>
              <div class="controls">
                <input type="date"  data-date-format="dd-mm-aaaa" class="datepicker span6" name="fecha_inicioP"/>
                <span class="help-block">(dia-mes-año)</span> </div>

             <div class="control-group">
              <label class="control-label">Finalizacion Produccion</label>
              <div class="controls">
                <input type="date"  data-date-format="dd-mm-aaaa" class="datepicker span6" name="fecha_finalP"/>
                <span class="help-block">(dia-mes-año)</span> </div>
            </div>-->
             
            <div class="form-actions">
            <a href="#" class="btn btn-success" onclick="CargarAjax_Form('registro/reg_lote.php','form_lote','GET');limpiar()">Guardar </a>

            </div>
         <form >
      </div>
    </div>
  </div>
</div>

<div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Lote Registrado</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                <th>ID Granja</th>
                <th>Fecha</th>
                <th>Estado</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                          <?php
        $sql="select  from lote ";
         $db = conectar();

        $query = $db->query($sql);
        foreach($db->query('SELECT * FROM lote') as $row) 
        {

        
?>
                                 

             <tr class="odd gradeX">


                  <td class="center">  <?php echo $row['id_granja'] ; ?> </td>
                  <td class="center">  <?php echo $row['fecha_inicioC'] ; ?> </td>
                  <td class="center">  <?php echo strtoupper($row['estado']) ; ?> </td>
          

              
                </tr>
              

                <?php

         }
            ?>
               
               
              </tbody>
            </table>
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



      
        
