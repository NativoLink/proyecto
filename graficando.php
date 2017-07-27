
<?php
 $con = new PDO ('mysql:host=localhost;dbname=c.a.c;charset=utf8mb4', 'root', 'Jose0424');
?>

<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['Huevos Fertiles', 'Huevos Sucio','Huevos Roto','Huevos Doble Yema'],
 <?php 
 $query = "SELECT granja.nombre, SUM(postura.huevos_f), SUM(postura.huevos_s),SUM(postura.huevos_r),SUM(postura.huevos_d) FROM postura, nave, lote, granja where postura.id_nave = nave.id_nave and nave.id_lote = lote.id_lote and lote.id_granja = granja.id_granja order by granja.id_granja";

  $exec = mysql_query($con,$query);
 while($row = mysql_fetch_array($exec)){

 echo "['".$row['SUM(postura.huevos_f)']."',".$row['SUM(postura.huevos_s)']."',".$row['SUM(postura.huevos_r)']."',".$row['SUM(postura.huevos_d)']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Browser wise visits'
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>