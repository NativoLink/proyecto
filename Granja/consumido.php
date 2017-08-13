
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

$query7= "SELECT granja.id_granja, sum(alimento_consumido.cantidad_h) as ah, sum(alimento_consumido.cantidad_m) as am from alimento_consumido, nave, lote, granja where alimento_consumido.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote and lote.id_granja = granja.id_granja and granja.id_granja='$id_granja'  AND (alimento_consumido.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')";

 foreach($con->query($query7)as $row) {
  $ah = $row['ah'];
  $am = $row['am'];
 }
 //cantidad hembras y machos comprados
 
 
 
 

?>

    <div id="container"  class="span6 area_grafica" ></div>
    <div id="alimentoconsumidocolum"  class="span6 area_grafica" ></div>


<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script> -->




    <script type="text/javascript">

Highcharts.chart('container', {
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
        name: 'Porciento',
        colorByPoint: true,
        data: [{
            name: 'Hembras',
            y: <?php echo $ah; ?>
        }, {
            name: 'Machos',
            y:  <?php echo $am; ?>,
            sliced: true,
            selected: true
        }, 
        ]
    }], 

  
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
            text: 'Cantidad'
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

