<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Nacimiento</a> </div>
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
        <div class="widget-title" style="background: #bdac0f"> <span class="icon"> <i class="icon-align-justify" style="color:white"></i> </span>
          <h5 style="color:white">Nacimiento</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal" id="form_nacimiento">
            <div class="control-group">
              <label class="control-label">incubadora:</label>
                    <div class="controls">

        <select type="number" class="span6" name="id_incubadora">
                <?php
        $sql="select  from lote ";
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $query = $db->query($sql);
        
        foreach($db->query('SELECT * FROM incubadora') as $row) 
        {

        
?>
                  
                   <option>

               <?php echo $row['id_incubadora'] ; ?> 

              </option>
              

                <?php

         }
            ?>
            </select>

              </div>
            </div>

            <div class="control-group">
              <label class="control-label">cantidad:</label>
              <div class="controls">
                <input type="number" class="span6" name="cantidad" />
              </div>
            </div>
            <div class="form-actions">
            <a href="#" class="btn btn-success" onclick="CargarAjax_Form('reg_nacimiento.php','form_nacimiento','GET');limpiar()">Guardar </a>

            </div>
            
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
            <h5>Nacimiento Registrado</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                  <th>ID Incubadora</th>
                  <th>Cantidad</th>
          
                 
                  
                </tr>
              </thead>
              <tbody>
                          <?php
        $sql="select  from lote ";
          $db = new PDO('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');

        $query = $db->query($sql);
        
        foreach($db->query('SELECT sum(cantidad) as can, id_incubadora  FROM  nacimiento group by id_incubadora') as $row) 
        {

        
?>
                                 

             <tr class="odd gradeX">


                  <td class="center">  <?php echo $row['id_incubadora'] ; ?> </td>
                  <td class="center">  <?php echo $row['can'] ; ?> </td>
       





              
                </tr>
              

                <?php

         }
            ?>
               
               
              </tbody>
            </table>
          </div>
        
