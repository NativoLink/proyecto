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


$query6= "SELECT granja.id_granja, sum(compra.cantidad_h) as cch, sum(compra.cantidad_m) as ccm from compra, nave, lote, granja where compra.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja = granja.id_granja AND granja.id_granja='$id_granja'and (compra.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')";

 foreach($con->query($query6)as $row) {
  $cch = $row['cch'];
  $ccm = $row['ccm'];
 }
 //cantidad hembras y machos comprados



 ?>
 
 <div id="compra"  class="span6 area_grafica" ></div>
<div id="compracolum"  class="span6 area_grafica" ></div>



<!--compra--> 

<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script>
 -->



  
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

