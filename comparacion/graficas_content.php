<?php
        include("../conectar.php");

$con = conectar();

if(!empty($_GET['fecha_i'])){
  $fec_ini=$_GET['fecha_i'];
  $fecha_fin=$_GET['fecha_f'];
}else{
  $y = date('Y')-1;
  $fec_ini = $y."-".date('m')."-".date('d');
  $fecha_fin = date('Y-m-d');
}
 

           ?>

  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Montellano</a> <a href="#" >Jarabacoa</a> <a href="#" class="current">Comparacion</a> </div>
     <h1>Comparacion De Las Granjas </h1>
  </div>
   
<div class="widget-box">
       
        <div class="widget-content nopadding">
         <div style="background: #cdcdcd;padding-top: 10px;" class="content-header ">            
          <div class="input-append date datepicker">
              <label>Desde </label>
          </div>
          <div class="input-append date datepicker">
            <input value="<?php if($_GET['fecha_i']){echo $_GET['fecha_i'];}else{ echo $fec_ini;}?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_i">
          </div>
      
          <div class="input-append date datepicker">
              <label>Hasta</label>
          </div>
          <div class="input-append date datepicker">
              <input value="<?php if($_GET['fecha_f']){echo $_GET['fecha_f'];}else{ echo  $fecha_fin;}?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_f">
          </div>
          <div class="input-append date datepicker">
              <button id="buscar" class="btn-success">Buscar</button>
          </div>
       </div>  
        <script>
        graficaSegun('postura');
        function graficaSegun(archivo){
              fecha_i = $("#fecha_i").val();
              fecha_f = $("#fecha_f").val();
              titulo = "..."; 
              if(archivo =='postura'){titulo='Postura De Huevos';}
              else if(archivo =='consumido'){titulo='Alimento Consumido';}
              else if(archivo =='encubados'){titulo='Huevos encubadoss';}
              else if(archivo =='mortalidad'){titulo='Mortalidad';}
              else if(archivo =='ventas'){titulo='Venta De Aves';}
              else if(archivo =='compras'){titulo='Compra De Aves';}

              $("#titulo").text(titulo);
              $("#ubicacion_final").text(titulo);
              // console.log(fecha_i+" "+fecha_f);
              CargarAjax('graficas-content','comparacion/'+archivo+'.php', 'fecha_i='+fecha_i+'&fecha_f='+fecha_f+'&archivo='+archivo, 'GET');
        }
          $("#buscar").click(function(){
              fecha_i = $("#fecha_i").val();
              fecha_f = $("#fecha_f").val();
              // console.log(fecha_i+" "+fecha_f);
              CargarAjax('graficas-content','comparacion/<?php echo $_GET['archivo']?>.php', 'fecha_i='+fecha_i+'&fecha_f='+fecha_f, 'GET');
          });
        </script>
 
          <div style="background: #efefef" class="content-header ">            
              <li class="btn btn-primary"<a onclick="graficaSegun('postura');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Postura De Huevos</a> </li>
             <li class="btn btn-info"<a onclick="graficaSegun('consumido');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Alimento Consumido</a> </li>

              <li class="btn btn-success"<a onclick="graficaSegun('encubados');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Huevos Incubados</a> </li>

              <li class="btn btn-warning"<a onclick="graficaSegun('mortalidad');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Mortalidad</a> </li>

              
             <li class="btn btn-danger""<a onclick="graficaSegun('ventas');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Venta De Aves</a> </li>

              
              <li class="btn btn-inverse""<a onclick="graficaSegun('compras');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Compra De Aves</a> </li>

              <li class="btn btn-default""<a onclick="graficaSegun('nacimiento');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Nacimiento</a> </li>
   
          </div>

         
       

 

   <!--Chart-box-->    
    
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Graficas importantes</h5>
          </div>
             
          <div  id="graficas-content">

     
               <div id="compracolum"  class="span6 area_grafica"  > </div>
   
             
          </div>
        </div>
        <div id="footer" class="span12"><a href="http://themedesigner.in"></a> </div>
      </div><!--End-Chart-box--> 
  

    </div>


<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>





<?php  
$list_granja ="";
$list_hf ="";
$list_hr ="";
$list_hs ="";
$list_hd ="";

$cant =1;
 $cont_new=1;
 $sql="SELECT * FROM granja ";
          $db=conectar();
        $query_g = $db->query($sql);

$res = $db->prepare( "SELECT COUNT(*)  FROM granja ");
$res->execute();
$num_rows = $res->fetchColumn();

foreach($db->query($sql)as $rowgg) {
$query66= "SELECT granja.nombre as nn,SUM(postura.huevos_f) as hf, SUM(postura.huevos_s) as hs,SUM(postura.huevos_r) as hr,SUM(postura.huevos_d) as hd FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja =granja.id_granja and granja.id_granja='".$rowgg['id_granja']."' AND (postura.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";

 

 foreach($db->query($query66)as $row66) {
  $nombre = $row66['nn'];
  $hf = $row66['hf'];
  $hs = $row66['hs'];
  $hr = $row66['hr'];
  $hd = $row66['hd'];
  

  
          if($cont_new<$num_rows){
              $list_granja =  $list_granja."'".$row66['nn']."',";
              $list_hf = $list_hf."".$hf.",";
              $list_hr = $list_hr."".$hs.",";
              $list_hs = $list_hs."".$hr.",";
              $list_hd = $list_hd."".$hd.",";
          }else{
              $list_granja =   $list_granja."'".$row66['nn']."'";
              $list_hf = $list_hf."".$hf;
              $list_hr = $list_hr."".$hs;
              $list_hs = $list_hs."".$hr;
              $list_hd = $list_hd."".$hd;
          }
          //echo $cont_new."-".$num_rows ;
         
           $cont_new++;

 }}
?>
