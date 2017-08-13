<?php  
include("../conectar.php");
$con = conectar();

$id_granja = $_GET['id_granja'];
// $nombre    = $_GET['nombre_granja'];

if(!empty($_GET['fecha_i'])){
  $fec_ini=$_GET['fecha_i'];
  $fecha_fin=$_GET['fecha_f'];
}else{
  $y = date('Y')-1;
  $fec_ini = $y."-".date('m')."-".date('d');
  $fecha_fin = date('Y-m-d');
}


 $query3= "SELECT granja.nombre, sum(incubadora.huevos_encu) as he , sum(incubadora.huevos_recha) as hr from incubadora, nave, lote, postura, granja where incubadora.id_postura = postura.id_postura and postura.id_nave = nave.id_nave and nave.id_lote = lote.id_lote and lote.id_granja = granja.id_granja and granja.id_granja='$id_granja' and (incubadora.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')";

 foreach($con->query($query3)as $row) {
  $he = $row['he'];
  $hr = $row['hr'];
 }
  // fin grafica huevos encubados y rechasados


 ?>
 
 <div id="huevosencubadosyrechasados"  class="span6 area_grafica" ></div>
<div id="huevosencubadosyrechasadoscolum"  class="span6 area_grafica" ></div>


 <!--encubadora--> 
<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script> -->




    <script type="text/javascript">

Highcharts.chart('huevosencubadosyrechasados', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Huevos en incubadora'
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
        name: 'Porciento',
        colorByPoint: true,
        data: [{
            name: 'Huevos incubados ',
            y: <?php echo $he; ?>
        }, {
            name: 'Huevos Rechasados',
            y:  <?php echo $hr; ?>,
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

Highcharts.chart('huevosencubadosyrechasadoscolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    title: {
        text: 'Huevos En Incubados'
    },
   
    xAxis: {
        categories: [
            'Huevos En Incubadora',
           
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
        name: 'Huevos Incubados',
        data: [<?php echo $he; ?>]

    },
     {
        name: 'Huevos Rechazados',
        data: [<?php echo $hr; ?>]

    },
     ]
});
        </script>

