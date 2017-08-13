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

 $query5= "SELECT sum(salida.cantidad_h) as h, sum(salida.cantidad_m) as m from salida, nave, lote where salida.motivo = 2 AND (salida.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')";

 foreach($con->query($query5)as $row) {
  $vh = $row['h'];
  $vm = $row['m'];
 }
 //cantidad hembras y machos vendidos



 ?>
 
 <div id="Venta"  class="span6 area_grafica" ></div>
<div id="ventacolum" class="span6 area_grafica" ></div>


 <!--venta--> 




    <script type="text/javascript">

Highcharts.chart('Venta', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Venta De Aves'
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
            y: <?php echo $vh; ?>
        }, {
            name: 'Machos ',
            y:  <?php echo $vm; ?>,
            sliced: true,
            selected: true
        }]
    }]
});
    </script>

<!--postura de huevos en columna--> 
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>






        <script type="text/javascript">

Highcharts.chart('ventacolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Venta De Aves'
    },
   
    xAxis: {
        categories: [
            'Venta De Aves',
           
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
        data: [<?php echo $vh; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $vm; ?>]

    },
     ]
});
        </script>

