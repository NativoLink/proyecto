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


 $query6= "SELECT sum(compra.cantidad_h) as cch, sum(compra.cantidad_m) as ccm from compra where (compra.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59') ";

 foreach($con->query($query6)as $row) {
  $cch = $row['cch'];
  $ccm = $row['ccm'];
 }
 //cantidad hembras y machos comprados



 ?>
 
 <div id="compra"  class="span6 area_grafica" ></div>
<div id="compracolum"  class="span6 area_grafica" ></div>

  <div class="span9">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Resumen de Psotura</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                

                <tr>

                <th>ID Granja</th>
                <th>Huevos Fertiles</th>
                <th>Huevos Sucios</th>
                <th>Huevos Rotos</th>
                <th>Huevos Doble Yema</th>
                <th>Total</th>
                 
                  
                </tr>
              </thead>
              <tbody>
    <?php
  
   

    // =============== TOTAL INDIVIDUAL ====
        $db = conectar();


        $sql2 = "SELECT granja.id_granja FROM granja";
        foreach($db->query($sql2) as $row2) 
        { 

        $sql = "SELECT granja.id_granja,granja.nombre, SUM(postura.huevos_f) AS hf, SUM(postura.huevos_s) AS hs,SUM(postura.huevos_r) AS hr,SUM(postura.huevos_d) AS hd FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja = '".$row2['id_granja']."' AND (postura.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";
        // $query = $db->query($sql);
        foreach($db->query($sql) as $row) 
        { 

          // =============== TOTAL GENERAL ====
          $total_g = $total_g  + $row['hf'] + $row['hs'] + $row['hr'] + $row['hd'];
?>                                 
                 <tr class="odd gradeX">
                  <td class="center">  
                      <?php echo $row2['id_granja'] ; ?>
                  </td>
                  <td class="center">  
                      <?php echo number_format($row['hf']); ?> 
                       <strong >(<?php echo round(($row['hf']/$total_g)*100,2); ?>%)</strong >
                  </td>
                  <td class="center">  
                      <?php echo number_format($row['hs']); ?> 
                      <strong >(<?php echo round(($row['hs']/$total_g)*100,2); ?>%)</strong >
                  </td>
                  <td class="center">  
                      <?php echo number_format($row['hr']); ?> 
                      <strong >(<?php echo round(($row['hr']/$total_g)*100,2); ?>%)</strong >
                  </td>
                  <td class="center">  
                      <?php echo number_format($row['hd']); ?>
                      <strong >(<?php echo round(($row['hd']/$total_g)*100,2); ?>%)</strong > 
                  </td>
                  <td class="center">  
                      <?php echo number_format($total_g) ; ?> 
                  </td>
              </tr>
        <?php  $total_g=0;
          }
        }
        ?>
               
               
              </tbody>
            </table>
          </div>

      </div>
    </div>
<!--compra--> 

<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script> -->




    <script type="text/javascript">

Highcharts.chart('compra', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Compra De Aves'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {

            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y:.1f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Porciento',
        colorByPoint: true,
        data: [{
            name: 'Hembras ',
            y: <?php echo $cch; ?>
        }, {
            name: 'Machos ',
            y:  <?php echo $ccm; ?>,
            sliced: true,
            selected: true
        }]
    }]
});
 </script>


<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>


        <script type="text/javascript">

Highcharts.chart('compracolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Compra de Aves'
    },
   
    xAxis: {
        categories: [
            'Compra De Aves',
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad'
        }
    },
    tooltip: {
         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
    series: [
      {
        name: 'Hembras',
        data: [<?php echo $cch; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $ccm; ?>]

    },
     ]
});
        </script>

