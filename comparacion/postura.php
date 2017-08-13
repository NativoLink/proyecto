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
$list_hf ="";
$list_hr ="";
$list_hs ="";
$list_hd ="";

$cant =1;
 $cont_new=1;
 $sql="SELECT * FROM granja ";
          $db=conectar();
        $query_g = $db->query($sql);

$res = $db->prepare( "SELECT COUNT(*)  FROM granja ");
$res->execute();
$num_rows = $res->fetchColumn();

foreach($db->query($sql)as $rowgg) {
$query66= "SELECT granja.nombre as nn,SUM(postura.huevos_f) as hf, SUM(postura.huevos_s) as hs,SUM(postura.huevos_r) as hr,SUM(postura.huevos_d) as hd FROM postura, nave, lote, granja WHERE postura.id_nave = nave.id_nave AND nave.id_lote = lote.id_lote AND lote.id_granja =granja.id_granja and granja.id_granja='".$rowgg['id_granja']."' AND (postura.fecha_reg BETWEEN  '$fec_ini 00:00:00' AND  '$fecha_fin 23:59:59')  ORDER BY granja.id_granja";

 

 foreach($db->query($query66)as $row66) {
  $nombre = $row66['nn'];
  $hf = $row66['hf'];
  $hs = $row66['hs'];
  $hr = $row66['hr'];
  $hd = $row66['hd'];
  

  
          if($cont_new<$num_rows){
              $list_granja =  $list_granja."'".$row66['nn']."',";
              $list_hf = $list_hf."".$hf.",";
              $list_hr = $list_hr."".$hs.",";
              $list_hs = $list_hs."".$hr.",";
              $list_hd = $list_hd."".$hd.",";
          }else{
              $list_granja =   $list_granja."'".$row66['nn']."'";
              $list_hf = $list_hf."".$hf;
              $list_hr = $list_hr."".$hs;
              $list_hs = $list_hs."".$hr;
              $list_hd = $list_hd."".$hd;
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
        text: 'Postura De Huevos'
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
    series: [{

        name: 'Huevos Fertiles ',
        data: [<?php echo $list_hf; ?>]

    },
    {

        name: 'Huevos Sucios ',
        data: [<?php echo  $list_hs; ?>]

    },
    {

        name: 'Huevos Rotos ',
        data: [<?php echo  $list_hr; ?>]

    },
    {

        name: 'Huevos Doble yema ',
        data: [<?php echo  $list_hd; ?>]

    }
    ]
});

    </script>
 
