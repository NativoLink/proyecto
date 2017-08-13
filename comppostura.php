<?php
        include("conectar.php");

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
        <div class="widget-title"> 
          <h2>Comparar granjas</h2>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
           
              <!--seleccionar-->   
             <div class="control-group" >
              <label class="control-label">Comparar Granjas</label>
              <div class="controls">
               
                
                <?php
        $sql="select * from granja ";
          $db=conectar();
        $query = $db->query($sql);
        foreach($db->query('SELECT * FROM granja') as $row) {

        
?> <label>
                  <input type="checkbox" name="radios" />
                <?php echo $row['nombre'] ; ?> </label><?php
         }
      ?>
            </div>
            </div>


              <!--calendario-->   
             <div class="control-group">
              <label class="control-label">Desde (mm-dd)</label>
              <div class="controls">
                <div class="input-append date datepicker">
                  <input type="date" data-date-format="dd-mm-aaaa" class="span" >
              </div>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">hasta (mm-dd)</label>
              <div class="controls">
                <div class="input-append date datepicker">
                  <input type="date" data-date-format="dd-mm-aaaa" class="span" >
                 </div>
              </div>
            </div>

                  
        </div>

             
              <li class="btn btn-primary"<a onclick="graficaSegun2('postura');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Postura De Huevos</a> </li>
             <li class="btn btn-info"<a onclick="graficaSegun2('consumido');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Alimento Consumido</a> </li>

              <li class="btn btn-success"<a onclick="graficaSegun2('encubados');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Huevos Incubados</a> </li>

              <li class="btn btn-warning"<a onclick="graficaSegun2('mortalidad');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Mortalidad</a> </li>

              
             <li class="btn btn-danger""<a onclick="graficaSegun2('ventas');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Venta De Aves</a> </li>

              
              <li class="btn btn-inverse""<a onclick="graficaSegun2('compras');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Compra De Aves</a> </li>

      

          </div>

         
       

 

   <!--Chart-box-->    
      <div class="row-fluid">
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Graficas importantes</h5>
          </div>
            
          <div class="widget-content">

              <div class="row-fluid">
                <table class="columns">
                  
                </table>
              </div>
            
            
            <hr>
              
          </div>
        </div>
        <div id="footer" class="span12"><a href="http://themedesigner.in"></a> </div>
      </div><!--End-Chart-box--> 
  

    </div>


<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>

<div id="compracolum"  class="span12 area_grafica" ></div>



    <script type="text/javascript">
<?php  


 $query66= "SELECT granja.nombre as nn,SUM(postura.huevos_f) as hf, SUM(postura.huevos_s) as hs,SUM(postura.huevos_r) as hr,SUM(postura.huevos_d) as hd FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja =granja.id_granja and granja.id_granja=1 ";

    $list_granja ="";

 

$cant =0;
 foreach($con->query($query66)as $row66) {
  $nombre = $row66['nn'];
  $hf = $row66['hf'];
  $hs = $row66['hs'];
  $hr = $row66['hr'];
  $hd = $row66['hd'];
  $cant++;
 }
?>


<?php  


 $query6= "SELECT granja.nombre as no, SUM(postura.huevos_f) as phf, SUM(postura.huevos_s) as phs,SUM(postura.huevos_r) as phr,SUM(postura.huevos_d) as phd FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja =granja.id_granja and granja.id_granja=2 ";

    $list_granja ="";

 

$cant =0;
 foreach($con->query($query6)as $row6) {
  $no = $row6['no'];
  $phf = $row6['phf'];
  $phs = $row6['phs'];
  $phr = $row6['phr'];
  $phd = $row6['phd'];
  $cant++;
 }
?>







Highcharts.chart('compracolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
        <?php  $cont_new=0; foreach($con->query($query66)as $row66) {
          $cont_new++;
          if($cont_new<$cant){
            $concatenacion=",";
          }else{
             $concatenacion="";
          }

 ?>
           <?php  $cont_new=0; foreach($con->query($query6)as $row6) {
          $cont_new++;
          if($cont_new<$cant){
            $concatenacion1=",";
          }else{
             $concatenacion1="";
          }

 ?>
           ' <?php echo $nombre."".$concatenacion;} ?>',
            ' <?php echo $no."".$concatenacion1;} ?>'
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{

        name: 'Huevos Fertiles ',
        data: [<?php echo $hf; ?>, <?php echo $phf; ?>]

    },
    {

        name: 'Huevos Sucios ',
        data: [<?php echo $hs; ?>, <?php echo $phs; ?>]

    },
    {

        name: 'Huevos Rotos ',
        data: [<?php echo $hr; ?>, <?php echo $phr; ?>]

    },
    {

        name: 'Huevos Doble yema ',
        data: [<?php echo $hd; ?>, <?php echo $phd; ?>]

    }
    ]
});

    </script>
 