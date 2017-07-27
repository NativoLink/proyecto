

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

$query= "SELECT granja.nombre, SUM(postura.huevos_f), SUM(postura.huevos_s),SUM(postura.huevos_r),SUM(postura.huevos_d) FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja = $id_granja AND (postura.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";

// $query= "SELECT granja.nombre, SUM(postura.huevos_f), SUM(postura.huevos_s),SUM(postura.huevos_r),SUM(postura.huevos_d) FROM postura, nave, lote, granja where postura.id_nave = nave.id_nave and nave.id_lote = lote.id_lote and lote.id_granja = granja.id_granja  order by granja.id_granja";

 foreach($con->query($query)as $row) {
  $hf = $row['SUM(postura.huevos_f)'];
  $hs = $row['SUM(postura.huevos_s)'];
  $hr = $row['SUM(postura.huevos_r)'];
  $hd = $row['SUM(postura.huevos_d)'];
  // fin grafica postura de huevos
}
  
 

 

  $query7= "SELECT sum(alimento_consumido.cantidad_h) as ah, sum(alimento_consumido.cantidad_m) as am from alimento_consumido";

 foreach($con->query($query7)as $row) {
  $ah = $row['ah'];
  $am = $row['am'];
 }
 //cantidad hembras y machos comprados
 
 
 
 

?>

      <div id="container" class="span6 area_grafica" ></div>
      
      <div id="posturascolum"  class="span6 area_grafica" ></div>



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
        text: 'Postura de Huevos'
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
            name: 'Huevos Fertiles',
            y: <?php echo $hf; ?>
        }, {
            name: 'Huevo sucios',
            y:  <?php echo $hs; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Huevos Rotos',
            y:  <?php echo $hr; ?>
        }, {
            name: 'Huevos Doble Yema',
            y:  <?php echo $hd; ?>
        }
        // , {
        //     name: 'Opera',
        //     y:  <?php echo $hf; ?>
        // }, {
        //     name: 'Proprietary or Undetectable',
        //     y:  <?php echo $hf; ?>
        // }
        ]
    }], 

  
});
    </script>




  


<!--postura de huevos en columna--> 
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>






        <script type="text/javascript">

Highcharts.chart('posturascolum', {
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
            'Postura De Huevos',
           
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
    series: [
      {
        name: 'Huevos Fertiles',
        data: [<?php echo $hf; ?>]

    },
     {
        name: 'Huevos sucios',
        data: [<?php echo $hs; ?>]

    },
     {
        name: 'Huevos Rotos',
        data: [<?php echo $hr; ?>]

    },
     {
        name: 'Huevos Doble Yema',
        data: [<?php echo $hd; ?>]

    }]
});
        </script>

