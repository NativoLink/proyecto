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

$query2= "SELECT SUM(ac.cantidad_h) as ah, SUM(ac.cantidad_m) as am FROM alimento_consumido ac, nave n 
where ac.id_nave = n.id_nave AND (ac.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59') ";

 foreach($con->query($query2)as $row) {
  $ah = $row['ah'];
  $am = $row['am'];
 
  // fin grafica alimento consumido
}

 ?>
 
 <div id="alimentoconsumido" class="span6 area_grafica" ></div>
<div id="alimentoconsumidocolum"  class="span6 area_grafica" ></div>


 



    <script type="text/javascript">

Highcharts.chart('alimentoconsumido', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Alimento Consumido'
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
                format: '<b>{point.name}</b>: {point.y:.1f} ',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'porciento',
        colorByPoint: true,
        data: [{
            name: 'Hembras ',
            y: <?php echo $ah; ?>
        }, {
            name: 'Machos',
            y:  <?php echo $am; ?>,
            sliced: true,
            selected: true
        }]
    }]
});
    </script>

<!--alimento consumido en columna--> 
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>






        <script type="text/javascript">

Highcharts.chart('alimentoconsumidocolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Alimento Consumido'
    },
   
    xAxis: {
        categories: [
            'Aliemto consumido',
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad Libras'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} lbs</b></td></tr>',
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
        data: [<?php echo $ah; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $am; ?>]

    },
     ]
});
        </script>

