

  <?php
  ini_set('display_errors', 1); 
  include('incluidos/conexion_inc.php');
  Conectarse();
  ?>                       <body>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!--<script type="text/javascript" src="js/googlechart.js"></script>-->
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);
    google.charts.setOnLoadCallback(drawChart4);
    google.charts.setOnLoadCallback(drawChart5);
    // google.charts.setOnLoadCallback(drawChart6);
    google.charts.setOnLoadCallback(drawChart7);
    google.charts.setOnLoadCallback(drawChart8);
    google.charts.setOnLoadCallback(drawChart9(1));
    google.charts.setOnLoadCallback(drawChart10);
    google.charts.setOnLoadCallback(drawChart11);

  function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php $sql="SELECT *  FROM partido";
         $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

             $sql2= "SELECT Partido.Nombre as 'Partido', Persona.Nombre as
            'Candidato', count(Boleta.Id_Boleta) as 'Total de Votos' 
                    FROM Boleta, Partido, Persona, Candidato 
                    WHERE Partido.Id_Partido = Boleta.Id_Partido 
                    AND Persona.Cedula = Candidato.Cedula 
                    AND Candidato.Id_Candidato = Boleta.Id_Candidato 
                    AND Boleta.Tipo_Boleta = 'A'
                    AND Partido.Id_Partido = '".$row['Id_Partido']."'";

             $id = $row['Id_Partido'];
            $query2 = mysql_query($sql2);
              $conn=0;
              $total=mysql_num_rows($query2);
              while($row2=mysql_fetch_array($query2)){
              $conn++;
             if( $total < $conn){
              // $colores[]= getRandomColor(); 
              $conca = ";";
             }else{ $conca = ",";}
             echo "['".$row2['Partido']."', ".$row2['Total de Votos']."]".$conca;//,
              }
            }
        echo "]);";?>
          var options = {
             title: 'Votos Por Partido'
           }
           // Dibujar el gráfico
           new google.visualization.ColumnChart( 
           //ColumnChart sería el tipo de gráfico a dibujar
             document.getElementById('GraficoGoogleChart-ejemplo-1')
           ).draw(data, options);
  }
// ======================Total de Votos Presidenciales ============================================
  function drawChart2() {
      var data2 = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php $sql="SELECT  candidato.id_candidato FROM candidato WHERE candidato.aspiracion = 1";
         $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

             $sql2= "SELECT count(boleta.id_candidato) as 'Total de Votos por Candidato', persona.nombre AS nombre_c 
                      FROM boleta, candidato, persona 
                      WHERE candidato.cedula = persona.cedula
                      AND candidato.id_candidato = boleta.id_candidato 
                      AND boleta.id_candidato = '".$row['id_candidato']."'";

             $id = $row['Id_Partido'];
            $query2 = mysql_query($sql2);
              $conn=0;
              $total=mysql_num_rows($query2);
              while($row2=mysql_fetch_array($query2)){
              $conn++;
             if( $total < $conn){
              // $colores[]= getRandomColor(); 
              $conca = ";";
             }else{ $conca = ",";}
             echo "['".$row2['nombre_c']."', ".$row2['Total de Votos por Candidato']."]".$conca;//,
              }
            }
        echo "]);";?>
          var options = {
             title: 'Total de Votos por Candidato'
           }
           // Dibujar el gráfico
           new google.visualization.ColumnChart( 
           //ColumnChart sería el tipo de gráfico a dibujar
             document.getElementById('GraficoGoogleChart-ejemplo-2')
           ).draw(data2, options);
  }
// ======================Votos Presidenciales Aportados por Mi Partido==========================
  function drawChart3() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php $sql="SELECT  candidato.id_candidato FROM candidato WHERE candidato.aspiracion = 1";
         $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

             $sql2= "SELECT COUNT(boleta.id_candidato)-(
    
        SELECT COUNT(boleta.id_candidato)-(
        
        SELECT COUNT(boleta.id_partido) FROM boleta, partido
      WHERE  boleta.id_partido = partido.id_partido
        AND partido.id_partido = (SELECT candidato.id_partido 
          FROM candidato WHERE candidato.id_candidato = '".$row['id_candidato']."')
            AND boleta.tipo_boleta = 'A')
            FROM boleta, candidato, persona 
            WHERE candidato.cedula = persona.cedula
            AND candidato.id_candidato = boleta.id_candidato 
            AND boleta.id_candidato = '".$row['id_candidato']."'
                
                
                ) as 'Votos Aportados por Mi Partido', persona.nombre AS 'nombre_c'
            FROM boleta, candidato, persona 
            WHERE candidato.cedula = persona.cedula
            AND candidato.id_candidato = boleta.id_candidato 
            AND boleta.id_candidato = '".$row['id_candidato']."'";

             $id = $row['Id_Partido'];
            $query2 = mysql_query($sql2);
              $conn=0;
              $total=mysql_num_rows($query2);
              while($row2=mysql_fetch_array($query2)){
              $conn++;
             if( $total < $conn){
              // $colores[]= getRandomColor(); 
              $conca = ";";
             }else{ $conca = ",";}
             echo "['".$row2['nombre_c']."', ".$row2['Votos Aportados por Mi Partido']."]".$conca;//,
              }
            }
        echo "]);";?>
          var options = {
             title: 'Votos Aportados por Mi Partido'
           }
           // Dibujar el gráfico
           new google.visualization.ColumnChart( 
           //ColumnChart sería el tipo de gráfico a dibujar
             document.getElementById('GraficoGoogleChart-ejemplo-3')
           ).draw(data, options);
  }
// ===================================================Votos Aportados por las alianzas =======================
  function drawChart4() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php $sql="SELECT  candidato.id_candidato FROM candidato WHERE candidato.aspiracion = 1";
         $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

             $sql2= "SELECT COUNT(boleta.id_candidato)-(
      
                  SELECT COUNT(boleta.id_partido) FROM boleta, partido
                WHERE  boleta.id_partido = partido.id_partido
                  AND partido.id_partido = (SELECT candidato.id_partido FROM candidato 
                    WHERE candidato.id_candidato = '".$row['id_candidato']."')
                      AND boleta.tipo_boleta = 'A'
                  
                  ) as 'Votos Aportados por Aliados', persona.nombre AS 'nombre_c'
              FROM boleta, candidato, persona 
              WHERE candidato.cedula = persona.cedula
              AND candidato.id_candidato = boleta.id_candidato 
              AND boleta.id_candidato = '".$row['id_candidato']."'";

               $id = $row['Id_Partido'];
              $query2 = mysql_query($sql2);
                $conn=0;
                $total=mysql_num_rows($query2);
                while($row2=mysql_fetch_array($query2)){
                $conn++;
               if( $total < $conn){
                // $colores[]= getRandomColor(); 
                $conca = ";";
               }else{ $conca = ",";}
               echo "['".$row2['nombre_c']."', ".$row2['Votos Aportados por Aliados']."]".$conca;//,
                }
              }
          echo "]);";?>
            var options = {
               title: 'Votos Aportados por Aliados'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-4')
             ).draw(data, options);
    }
// ================================| REVISAR |================Total de Votos presidenciales por colegio====================
  function drawChart5() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          $sql="SELECT  id_colegio FROM colegio";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  id_candidato FROM candidato where candidato.aspiracion = 1";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT count(boleta.id_candidato) as 'Total de Votos por Candidato', persona.nombre AS nombre_c
                      FROM boleta, candidato, persona, colegio 
                      WHERE candidato.cedula = persona.cedula
                      AND colegio.id_colegio = boleta.id_colegio
                      AND candidato.id_candidato = boleta.id_candidato
                      AND boleta.id_colegio = '".$row['id_colegio']."'
                      AND boleta.id_candidato = '".$row['id_candidato']."'";

               $id = $row['Id_Partido'];
              $query2 = mysql_query($sql2);
                $conn=0;
                $total=mysql_num_rows($query2);
                while($row2=mysql_fetch_array($query2)){
                $conn++;
               if( $total < $conn){
                // $colores[]= getRandomColor(); 
                $conca = ";";
               }else{ $conca = ",";}
               echo "['".$row2['nombre_c']."', ".$row2['Total de Votos por Candidato']."]".$conca;//,
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-5')
             ).draw(data, options);
    }
// ===================================== Votos aportados por mis aliados por colegio =================
  function drawChart6() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          $sql="SELECT  id_colegio FROM colegio";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  id_candidato FROM candidato where candidato.aspiracion = 1";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT count(boleta.id_candidato)-( 

            select count(boleta.id_candidato) 
            from boleta, candidato, persona, colegio 
            where candidato.cedula = persona.cedula
            and colegio.id_colegio = boleta.id_colegio
            and candidato.id_candidato = boleta.id_candidato
            and boleta.id_partido = candidato.id_partido
            and boleta.id_colegio = '".$row['id_colegio']."'
            and boleta.id_candidato = '".$row1['id_candidato']."'

            ) as 'Total de Votos por Candidato', persona.nombre as nombre_c
            from boleta, candidato, persona, colegio 
            where candidato.cedula = persona.cedula
            and colegio.id_colegio = boleta.id_colegio
            and candidato.id_candidato = boleta.id_candidato
            and boleta.id_colegio = '".$row['id_colegio']."
            and boleta.id_candidato = '".$row1['id_candidato']."'";

               $id = $row['Id_Partido'];
              $query2 = mysql_query($sql2);
                $conn=0;
                $total=mysql_num_rows($query2);
                while($row2=mysql_fetch_array($query2)){
                $conn++;
               if( $total < $conn){
                // $colores[]= getRandomColor(); 
                $conca = ";";
               }else{ $conca = ",";}
               echo "['".$row2['nombre_c']."', ".$row2['Total de Votos por Candidato']."]".$conca;//,
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-6')
             ).draw(data, options);
    }
// ===================================== Votos Aportados Por Mi partido =================
  function drawChart7() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          $sql="SELECT  id_colegio FROM colegio";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  id_candidato FROM candidato where candidato.aspiracion = 1";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT count(boleta.id_candidato) as 'Total de Votos por Candidato', persona.nombre AS nombre_c 
                      from boleta, candidato, persona, colegio 
                      where candidato.cedula = persona.cedula
                      and colegio.id_colegio = boleta.id_colegio
                      and candidato.id_candidato = boleta.id_candidato
                      and boleta.id_partido = candidato.id_partido
                      and boleta.id_colegio = '".$row['id_colegio']."'
                      and boleta.id_candidato = '".$row1['id_candidato']."'";

               $id = $row['Id_Partido'];
              $query2 = mysql_query($sql2);
                $conn=0;
                $total=mysql_num_rows($query2);
                while($row2=mysql_fetch_array($query2)){
                $conn++;
               if( $total < $conn){
                // $colores[]= getRandomColor(); 
                $conca = ";";
               }else{ $conca = ",";}
               echo "['".$row2['nombre_c']."', ".$row2['Total de Votos por Candidato']."]".$conca;//,
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-7')
             ).draw(data, options);
    }
// =======================| REVISAR |============== Total de Votos presidenciales por Distrito =================
  function drawChart8() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          $sql="SELECT id_distrito from distrito_municipal";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  DISTINCT distrito_municipal.nombre AS 'nombre_c',id_colegio
            from colegio, distrito_municipal 
            where colegio.id_distrito = distrito_municipal.id_distrito
            AND distrito_municipal.id_distrito = '".$row['id_distrito']."'";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT DISTINCT id_candidato from candidato where candidato.aspiracion = 1";
              $query2 = mysql_query($sql2);
                
                
                while($row2=mysql_fetch_array($query2)){

                  $sql3="SELECT count(boleta.id_candidato) as 'Total de Votos por Candidato', persona.nombre as 'nombre_p'  
                    from boleta, candidato, persona, colegio 
                    where candidato.cedula = persona.cedula
                    and colegio.id_colegio = boleta.id_colegio
                    and candidato.id_candidato = boleta.id_candidato
                    and boleta.id_colegio = '".$row1['id_colegio']."'
                    and boleta.id_candidato = '".$row2['id_candidato']."' ";
                    $conn=0;
                    $query3 = mysql_query($sql3);
                  while($row3=mysql_fetch_array($query3)){
                      $conn++;
                     if( $total < $conn){
                      $conca = ";";
                     }else{ $conca = ",";}
                     echo "['".$row1['nombre_c']."-".$row3['nombre_p']."', ".$row3['Total de Votos por Candidato']."]".$conca;//,
                  }
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.PieChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-8')
             ).draw(data, options);
    }
// =======================| REVISAR |============== Votos Aportados Por Mi partido por Distrito =================
  function drawChart9(id_cand) {
      var candijs = id_cand;
      <?php $id_candi = "document.write(candijs);";?> 
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          // $id_candi = 1;
          $sql="SELECT id_distrito from distrito_municipal";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  DISTINCT distrito_municipal.nombre AS 'nombre_c', id_colegio
            from colegio, distrito_municipal 
            where colegio.id_distrito = distrito_municipal.id_distrito
            AND distrito_municipal.id_distrito = '".$row['id_distrito']."'";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT DISTINCT id_candidato from candidato where candidato.aspiracion = 1 AND id_candidato='$id_candi'";
              $query2 = mysql_query($sql2);
                
                
                while($row2=mysql_fetch_array($query2)){

                  $sql3="SELECT count(boleta.id_candidato) as 'Total de Votos por Candidato', persona.nombre as 'nombre_p'
                      from boleta, candidato, persona, colegio 
                      where candidato.cedula = persona.cedula
                      and colegio.id_colegio = boleta.id_colegio
                      and candidato.id_candidato = boleta.id_candidato
                      and boleta.id_partido = candidato.id_partido
                      and boleta.id_colegio = '".$row1['id_colegio']."'
                      and boleta.id_candidato = '".$row2['id_candidato']."' ";
                    $conn=0;
                    $query3 = mysql_query($sql3);
                  while($row3=mysql_fetch_array($query3)){
                      $conn++;
                     if( $total < $conn){
                      $conca = ";";
                     }else{ $conca = ",";}
                     echo "['".$row1['nombre_c']."-".$row3['nombre_p']."', ".$row3['Total de Votos por Candidato']."]".$conca;//,
                  }
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.PieChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-9')
             ).draw(data, options);
    }
// =======================| REVISAR |============== Votos Aportados Por Mi partido por Distrito =================
  function drawChart10() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 
          $sql="SELECT id_distrito from distrito_municipal";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT  DISTINCT distrito_municipal.nombre AS 'nombre_c', id_colegio
            from colegio, distrito_municipal 
            where colegio.id_distrito = distrito_municipal.id_distrito
            AND distrito_municipal.id_distrito = '".$row['id_distrito']."'";
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT DISTINCT id_candidato from candidato where candidato.aspiracion = 1";
              $query2 = mysql_query($sql2);
                
                
                while($row2=mysql_fetch_array($query2)){

                  $sql3="SELECT count(boleta.id_candidato)-( 
                          select count(boleta.id_candidato)
                          from boleta, candidato, persona, colegio 
                          where candidato.cedula = persona.cedula
                          and colegio.id_colegio = boleta.id_colegio
                          and candidato.id_candidato = boleta.id_candidato
                          and boleta.id_partido = candidato.id_partido
                          and boleta.id_colegio = '".$row1['id_colegio']."'
                          and boleta.id_candidato = '".$row2['id_candidato']."'

                          ) as 'Total de Votos por Candidato', persona.nombre  as 'nombre_p'
                          from boleta, candidato, persona, colegio 
                          where candidato.cedula = persona.cedula
                          and colegio.id_colegio = boleta.id_colegio
                          and candidato.id_candidato = boleta.id_candidato
                          and boleta.id_colegio = '".$row1['id_colegio']."'
                          and boleta.id_candidato = '".$row2['id_candidato']."' ";
                    $conn=0;
                    $query3 = mysql_query($sql3);
                  while($row3=mysql_fetch_array($query3)){
                      $conn++;
                     if( $total < $conn){
                      $conca = ";";
                     }else{ $conca = ",";}
                     echo "['".$row1['nombre_c']."-".$row3['nombre_p']."', ".$row3['Total de Votos por Candidato']."]".$conca;//,
                  }
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-10')
             ).draw(data, options);
    }
  function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Partido', 'Total'],
         <?php 

          $sql="SELECT id_municipio from municipio ";
          $query = mysql_query($sql);
          while($row = mysql_fetch_array($query) ){

            $sql1="SELECT colegio.id_colegio, municipio.nombre AS 'nombre_m'
            from colegio, municipio 
            where colegio.id_municipio = municipio.id_municipio 
            and municipio.id_municipio = '".$row['id_municipio']."'";
          
            $query1 = mysql_query($sql1);
            while($row1 = mysql_fetch_array($query1) ){

             $sql2= "SELECT candidato.id_candidato,persona.nombre  as 'nombre_p'
                  from candidato, persona 
                  where candidato.cedula = persona.cedula and candidato.aspiracion = 1";
                $query2 = mysql_query($sql2);
                $conteo = 0;
                while($row2=mysql_fetch_array($query2)){
                  $sql3="SELECT count(boleta.id_candidato)-( 
                      select count(boleta.id_candidato) AS 'total'
                      from boleta, candidato, persona, colegio 
                      where candidato.cedula = persona.cedula
                      and colegio.id_colegio = boleta.id_colegio
                      and candidato.id_candidato = boleta.id_candidato
                      and boleta.id_partido = candidato.id_partido
                      and boleta.id_colegio = '".$row1['id_colegio']."'
                      and boleta.id_candidato = '".$row2['id_candidato']."' ";
                    
                    $query3 = mysql_query($sql3);
                  while($row3 = mysql_fetch_array($query3)){
                     $conteo = $row3['boleta conteo'];
                      $conn++;
                     if( $total < $conn){
                      $conca = ";";
                     }else{ $conca = ",";}
                     echo "['".$row2['nombre_p']."',".$row3['Total de Votos por Candidato']."]".$conca;//,
                  }
                }
              }
            }
          echo "]);";?>
            var options = {
               title: 'Total de Votos por Candidato'
             }
             // Dibujar el gráfico
             new google.visualization.ColumnChart( 
             //ColumnChart sería el tipo de gráfico a dibujar
               document.getElementById('GraficoGoogleChart-ejemplo-11')
             ).draw(data, options);
    }
</script>
<table class="columns">
      <tr>
        <td><div id="GraficoGoogleChart-ejemplo-1" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-2" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-3" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-4" style="width: 400px; height: 600px"></div></td>
      </tr>
      <tr>
        <td><div id="GraficoGoogleChart-ejemplo-5" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-6" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-7" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-8" style="width: 400px; height: 600px"></div></td>
      </tr>
      <tr>
        <td><div id="GraficoGoogleChart-ejemplo-9" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-10" style="width: 400px; height: 600px"></div></td>
        <td><div id="GraficoGoogleChart-ejemplo-11" style="width: 400px; height: 600px"></div></td>
      </tr>
      <tr>
      </tr>
</table>




<select id="mySelect" onchange="myFunction()">
  <option value="1">Danilo
  <option value="2">Luis 
  <option value="3">3
  <option value="4">4
  <option value="5">5
</select>

<p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
      // alert(x);
      drawChart9(x);
  
}
</script>

</body>
