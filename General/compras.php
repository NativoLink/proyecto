<?php 
include("../conectar.php");
$con = conectar();



  $query6= "SELECT sum(compra.cantidad_h) as ch, sum(compra.cantidad_m) as cm from compra AND (compra.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59') ";

 foreach($con->query($query6)as $row) {
  $cch = $row['ch'];
  $ccm = $row['cm'];
 }
 //cantidad hembras y machos comprados



 ?>
 
 <div id="compra"  class="span6 area_grafica" ></div>
<div id="compracolum"  class="span6 area_grafica" ></div>


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
        text: 'compra de Aves'
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
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'compra de Aves',
           
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
        data: [<?php echo $cch; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $ccm; ?>]

    },
     ]
});
        </script>

