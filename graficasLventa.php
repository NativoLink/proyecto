<?php 
include("conectar.php");
$con = conectar();



 $query5= "SELECT sum(salida.cantidad_h) as h, sum(salida.cantidad_m) as m from salida, nave, lote where salida.motivo = 2";

 foreach($con->query($query5)as $row) {
  $vh = $row['h'];
  $vm = $row['m'];
 }
 //cantidad hembras y machos vendidos



 ?>
 <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" class="tip-bottom" data-original-title="Ir al inicio"><i class="icon-home"></i> Inicio</a></div>
  </div>

  <div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" class="tip-bottom" data-original-title="Ir al inicio">
        <i class="icon-home"> </i> Inicio</a>
    </div>
  </div>



                  <!--buscar-->   
                   <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>

  <div class="col-lg-6" style="padding-left: 20px;">
                  <label class="control-label col-lg-6">Desde </label>
                    <div class="input-append date datepicker">
                      <input type="date" data-date-format="dd-mm-aaaa" class="span" >
                   </div>
              
           

             <label class="control-label col-lg-6">Hasta </label>
                    <div class="input-append date datepicker">
                      <input type="date" data-date-format="dd-mm-aaaa" class="span" >
                   </div>
    </div>

<p>
             
              <li class="btn btn-primary"<a onclick="CargarAjax('contenido','graficasL.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Postura De Huevos</a> </li>
             <li class="btn btn-info"<a onclick="CargarAjax('contenido','graficasLalimentoconsumido.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Alimento Consumido</a> </li>

              <li class="btn btn-success"<a onclick="CargarAjax('contenido','graficasLhuevosincubados.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Huevos encubados</a> </li>

              <li class="btn btn-warning"<a onclick="CargarAjax('contenido','graficasLmortalidad.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Mortalidad</a> </li>

              
              <li class="btn btn-danger""<a onclick="CargarAjax('contenido','graficasLventa.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Venta De Aves</a> </li>

              
              <li class="btn btn-inverse""<a onclick="CargarAjax('contenido','graficasLcompra.php', '', 'GET');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Compra De Aves</a> </li>
            </p>
          </div>


    <!--Chart-box-->    
      <div class="row-fluid">
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
           <h5>Graficas importantes</h5>
                    </div>
          
 <div id="Venta" class="span6"  style="min-width: 310px; height: 500px; max-width: 600px; margin: 0 auto"></div>
<div id="ventacolum" style="min-width: 210px; height: 400px; margin: 0 auto"></div>


 <!--venta--> 

<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script>




    <script type="text/javascript">

Highcharts.chart('Venta', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Venta de Aves'
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
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'venta de Aves',
           
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
        data: [<?php echo $vh; ?>]

    },
     {
        name: 'Machos',
        data: [<?php echo $vm; ?>]

    },
     ]
});
        </script>

