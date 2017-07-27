<?php 
include("../conectar.php");
$con = conectar();

$id_granja = $_GET['id_granja'];
if(!empty($_GET['fecha_i'])){
  $fec_ini=$_GET['fecha_i'];
  $fecha_fin=$_GET['fecha_f'];
}else{
  $y = date('Y')-1;
  $fec_ini = $y."-".date('m')."-".date('d');
  $fecha_fin = date('Y-m-d');
}

echo  $query4= "SELECT sum(salida.cantidad_h) as hh, sum(salida.cantidad_m) as mm from salida, nave, lote where (salida.motivo ='1' AND lote.id_granja='$id_granja') AND nave.id_lote=lote.id_lote
    AND (salida.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')";

 foreach($con->query($query4)as $row) {
  $hm = $row['hh'];
  $mm = $row['mm'];
 }
 //cantidad hembras y machos muertos


 ?>
 <div id="Mortalidad"  class="span6 area_grafica" ></div>
<div id="Mortalidadcolum"  class="span6 area_grafica" ></div>


  <!--mortalidad--> 

<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script> -->




    <script type="text/javascript">

Highcharts.chart('Mortalidad', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Mortalidad'
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
            y: <?php echo $hm; ?>
        }, {
            name: 'Machos ',
            y:  <?php echo $mm; ?>,
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

Highcharts.chart('Mortalidadcolum', {
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
            'Mortalidad',
           
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
        data: [<?php echo $hm; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $mm; ?>]

    },
     ]
});
        </script>

