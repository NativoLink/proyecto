
  
<?php  

include("conectar.php");
$con = conectar();
// foreach($con->query("SELECT * FROM granjas")as $row) {

// }

$query= "SELECT SUM(postura.huevos_f), SUM(postura.huevos_s),SUM(postura.huevos_r),SUM(postura.huevos_d) FROM postura, nave, lote, granja where postura.id_nave = nave.id_nave and nave.id_lote = lote.id_lote and lote.id_granja = granja.id_granja and granja.id_granja = 2";
// $cant =$resTotal->num_rows;

 // $exec=$con->query($query);
 // while($row = mysql_fetch_array($exec)){
 foreach($con->query($query)as $row) {
  $hf = $row['SUM(postura.huevos_f)'];
  $hs = $row['SUM(postura.huevos_s)'];
  $hr = $row['SUM(postura.huevos_r)'];
  $hd = $row['SUM(postura.huevos_d)'];
 // "['".$row['SUM(postura.huevos_f)']."',".$row['SUM(postura.huevos_s)']."',".$row['SUM(postura.huevos_r)']."',".$row['SUM(postura.huevos_d)']."],";
 }// $resTotal =$con->query("SELECT * FROM postura WHERE huevosf= ");
// $cant =$resTotal->num_rows;

?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Jarabacoa</a><a href="#">Comparacion</a> </div>
    <h1>Jarabacoa</h1>
  </div>
  

   <!--Chart-box-->    
      <div class="row-fluid">
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Graficas importantes</h5>
          </div>
            
          <div class="widget-content">

              <div id="posh" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
              
               <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>
        </div>
        <div id="footer" class="span12"><a href="http://themedesigner.in"></a> </div>
      </div><!--End-Chart-box--> 
  

    </div>


<!--end-Footer-part-->




<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script>




    <script type="text/javascript">

Highcharts.chart('posh', {
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
                format: '<b>{point.name}</b>: {point.y:.1f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [{
            name: 'Huevos Fertiles',
            y: <?php echo $hf; ?>
        }, {
            name: 'Huevos sucios',
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
    }]
});
    </script>
<!--postura de huevos en columna--> 
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>






        <script type="text/javascript">

Highcharts.chart('container', {
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

