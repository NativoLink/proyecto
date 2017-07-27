

<?php  
include("../conectar.php");
$con = conectar();

// foreach($con->query("SELECT * FROM granjas")as $row) {

// }

if(!empty($_GET['fecha_i'])){
  $fec_ini=$_GET['fecha_i'];
  $fecha_fin=$_GET['fecha_f'];
}else{
  $y = date('Y')-1;
  $fec_ini = $y."-".date('m')."-".date('d');
  $fecha_fin = date('Y-m-d');
}

$query= "SELECT granja.nombre, SUM(postura.huevos_f), SUM(postura.huevos_s),SUM(postura.huevos_r),SUM(postura.huevos_d) FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja = granja.id_granja AND (postura.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";

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
<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script>


<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Dashboard</a><a href="#" class="current" "><span id="ubicacion_final"></span></a> </div>
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

  <div class="" style="">
                 
       <div style="background: #cdcdcd;padding-top: 10px;" class="content-header ">            
          <div class="input-append date datepicker">
              <label>Hasta </label>
          </div>
          <div class="input-append date datepicker">
            <input value="<? if($_GET['fecha_i']){echo $_GET['fecha_i'];}else{ echo $fec_ini;}?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_i">
          </div>
      
          <div class="input-append date datepicker">
              <label>Desde</label>
          </div>
          <div class="input-append date datepicker">
              <input value="<? if($_GET['fecha_f']){echo $_GET['fecha_f'];}else{ echo  $fecha_fin;}?>" data-date-format="dd-mm-aaaa" class="span" type="date" id="fecha_f">
          </div>
          <div class="input-append date datepicker">
              <button id="buscar" class="btn-success">Buscar</button>
          </div>
       </div>  
        <script>
        graficaSegun('postura');
        function graficaSegun(archivo){
              fecha_i = $("#fecha_i").val();
              fecha_f = $("#fecha_f").val();
              titulo = "..."; 
              if(archivo =='postura'){titulo='Postura De Huevos';}
              else if(archivo =='consumido'){titulo='Alimento Consumido';}
              else if(archivo =='encubados'){titulo='Huevos encubadoss';}
              else if(archivo =='mortalidad'){titulo='Mortalidad';}
              else if(archivo =='ventas'){titulo='Venta De Aves';}
              else if(archivo =='compras'){titulo='Compra De Aves';}

              $("#titulo").text(titulo);
              $("#ubicacion_final").text(titulo);
              // console.log(fecha_i+" "+fecha_f);
              CargarAjax('graficas-content','General/'+archivo+'.php', 'fecha_i='+fecha_i+'&fecha_f='+fecha_f+'&archivo='+archivo, 'GET');
        }
          $("#buscar").click(function(){
              fecha_i = $("#fecha_i").val();
              fecha_f = $("#fecha_f").val();
              // console.log(fecha_i+" "+fecha_f);
              CargarAjax('graficas-content','General/<? echo $_GET['archivo']?>.php', 'fecha_i='+fecha_i+'&fecha_f='+fecha_f, 'GET');
          });
        </script>
 
          <div style="background: #efefef" class="content-header ">            
              <li class="btn btn-primary"<a onclick="graficaSegun('postura');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Postura De Huevos</a> </li>
             <li class="btn btn-info"<a onclick="graficaSegun('consumido');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Alimento Consumido</a> </li>

              <li class="btn btn-success"<a onclick="graficaSegun('encubados');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Huevos encubados</a> </li>

              <li class="btn btn-warning"<a onclick="graficaSegun('mortalidad');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Mortalidad</a> </li>

              
             <li class="btn btn-danger""<a onclick="graficaSegun('ventas');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Venta De Aves</a> </li>

              
              <li class="btn btn-inverse""<a onclick="graficaSegun('compras');"  href="#"> <i class="icon-globe"></i> <span class="label label-important"></span>Compra De Aves</a> </li>
   
          </div>

    <!--Chart-box-->    
      <div class="row-fluid">
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
           <h5>Graficas importantes</h5>
                 </div>
          
          
          <div class="widget-content" id="graficas-content">

   <!--    <div id="container" class="span6" style="min-width: 210px; height: 400px; max-width: 500px; margin: 0 auto"></div>
      
      <div id="posturascolum" style="min-width: 210px; height: 400px; margin: 0 auto"></div>
 -->

 <!--llamar y diseñar las graficas--> 
              
              
          </div>
        </div>
        <div id="footer" class="span12"><a href="http://themedesigner.in"></a> </div>
      </div><!--End-Chart-box--> 
  



    </div>



<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script>




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

