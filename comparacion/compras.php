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

 //cantidad hembras y machos comprados



 ?>
 
<div id="compracolum"  style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto" ></div>
<!--compra--> 

<!-- <script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/exporting.js"></script> -->




<?php  
$list_granja ="";
$list_ah ="";
$list_am ="";


$cant =1;
 $cont_new=1;
 $sql="SELECT * FROM granja ";
          $db=conectar();
        $query_g = $db->query($sql);

$res = $db->prepare( "SELECT COUNT(*)  FROM granja ");
$res->execute();
$num_rows = $res->fetchColumn();

foreach($db->query($sql)as $rowgg) {
$query66= "SELECT granja.nombre as nn, sum(compra.cantidad_h) as ah, sum(compra.cantidad_m) as am from compra, nave, lote, granja where compra.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja = granja.id_granja and granja.id_granja='".$rowgg['id_granja']."' AND (compra.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";

 

 foreach($db->query($query66)as $row66) {
  $nombre = $row66['nn'];
  $ah = $row66['ah'];
  $am = $row66['am'];
 
  

  
          if($cont_new<$num_rows){
              $list_granja =  $list_granja."'".$row66['nn']."',";
              $list_ah = $list_ah."".$ah.",";
              $list_am = $list_am."".$am.",";

          }else{
              $list_granja =   $list_granja."'".$row66['nn']."'";
              $list_ah = $list_ah."".$ah;
              $list_am = $list_am."".$am;
           
          }
          //echo $cont_new."-".$num_rows ;
         
           $cont_new++;

 }}
?>
    <script type="text/javascript">








Highcharts.chart('compracolum', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Comparacion De Granjas'
    },
    subtitle: {
        text: 'Compra De aves'
    },
    xAxis: {
        categories: [
           <?php echo $list_granja; ?>

            
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
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td>' +
            '<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
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
    series: [{

        name: 'Hembras ',
        data: [<?php echo $list_ah; ?>]

    },
   
    {

        name: 'Machos ',
        data: [<?php echo  $list_am; ?>]

    }
    ]
});

    </script>
 
