<?php
 include("../conectar.php");
  $db = conectar();
?>
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">alimento consumido</a> </div>
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
</div>
<div class="container-fluid">
<div id="gritter-notice-wrapper" style="display: none;"><div id="gritter-item-1" class="gritter-item-wrapper" style=""><div class="gritter-top"></div><div class="gritter-item"><div class="gritter-close" style="display: none;"></div><img src="img/demo/envelope.png" class="gritter-image"><div class="gritter-with-image"><span class="gritter-title">Guardado!</span></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div></div> 
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title" style="background: #231340"> <span class="icon"> <i class="icon-align-justify" style="color:white"></i> </span>
          <h5 style="color: white">Alimento Consumido</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="GET" class="form-horizontal" id="form_alimento">
            <div class="control-group">
              <label class="control-label">Nave:</label>
                    <div class="controls">

        <select type="number" class="span6" name="id_nave">
                <?php
        $sql="select  from lote ";
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
              <label class="control-label">Hembras:</label>
              <div class="controls">
                <input type="text" class="span6" name="cantidad_h"  onkeypress="return valida(event)"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Machos:</label>
              <div class="controls">
                <input type="text"  class="span6" name="cantidad_m" onkeypress="return valida(event)"/>
              </div>

              <?php  $fecha_ini = date('Y-m-d'); ?>
              <label class="control-label">Fecha:</label>
                  <div class="controls">
                  <div class="input-append date datepicker">
                  <input value="<?php echo $fecha_ini; ?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_i" name="fecha_reg"></div>
                  </div>

              


              <div class="form-actions">
              <a href="#" class="btn btn-success" onclick="vCamposVacios();">Guardar </a>

               <button  class="btn btn-primary" onclick="mostrarTabla('id_div_tabla')">Registros</button>
              
              </div>
            
            </div>
         <form >
      </div>
    </div>
  </div>
</div>
<script>

  function vCamposVacios(){
    cm =  $("#cantidad_m").val();
    ch =  $("#cantidad_h").val();

    if(cm!=undefined && ch!=undefined){
      // CargarAjax_Form('registro/reg_alimento consumido.php','form_alimento','GET');
    }else{
      alert('campos vacios');
    }

  }
  function mostrarTabla(id_div){
    $("#"+id_div+"").toggle();

  }
  function limpiar() {
   $(".span6").text("");
    $(".span6").val(""); 
    console.log("limpiar");
    $("#gritter-notice-wrapper").show(); 
  }
</script>



      <div class="span12" id="id_div_tabla" style="display: none">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Alimento Consumido Registrada</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                  <th>ID Nave</th>
                  <th>Hembra</th>
                  <th>Macho</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                          <?php
        $sql="select  from lote ";
        $query = $db->query($sql);
        
        foreach($db->query('SELECT sum(cantidad_h) as totalh , sum(cantidad_m) as totalm, id_nave FROM nave group by id_nave') as $row) 
        {

        
?>
                                 

             <tr class="odd gradeX">


                  <td class="center">  <?php echo $row['id_nave'] ; ?> </td>
                  <td class="center">  <?php echo $row['totalh'] ; ?> </td>
                  <td class="center">  <?php echo $row['totalm'] ; ?> </td>





              
                </tr>
              

                <?php

         }
            ?>
               
               
              </tbody>
            </table>
          </div>
        
