      <?php
        include("conectar.php");
           ?>

  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Montellano</a> <a href="#" >Jarabacoa</a> <a href="#" class="current">Comparacion</a> </div>
     <h1>Comparacion De Las Granjas</h1>
  </div>
   
<div class="widget-box">
        <div class="widget-title"> 
          <h2>Comparar granjas</h2>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
           
              <!--seleccionar-->   
             <div class="control-group" >
              <label class="control-label">Comparar Granjas</label>
              <div class="controls">
               
                
                <?php
        $sql="select * from granja ";
          $db=conectar();
        $query = $db->query($sql);
        foreach($db->query('SELECT * FROM granja') as $row) {

        
?> <label>
                  <input type="checkbox" name="radios" />
                <?php echo $row['nombre'] ; ?> </label><?php
         }
      ?>
            </div>
            </div>


              <!--calendario-->   
             <div class="control-group">
              <label class="control-label">Desde (mm-dd)</label>
              <div class="controls">
                <div class="input-append date datepicker">
                  <input type="date" data-date-format="dd-mm-aaaa" class="span" >
              </div>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">hasta (mm-dd)</label>
              <div class="controls">
                <div class="input-append date datepicker">
                  <input type="date" data-date-format="dd-mm-aaaa" class="span" >
                 </div>
              </div>
            </div>

                  <!--buscar-->   
                   <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
          
        </div>



            </div>
            </div>

         
         
 

   <!--Chart-box-->    
      <div class="row-fluid">
        <div class="widget-box" >
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Graficas importantes</h5>
          </div>
            
          <div class="widget-content">

              <div class="row-fluid">
                <table class="columns">
                  <tr>
                    <td><div id="chart_div"></div></td> <!-- PIE CHART -->
                    <td> <div id="barchart_values" style="width: 400px; height: auto;"></div></td><!-- BAR CHART -->
                  </tr>
                </table>
              </div>
            
            
            <hr>
              
          </div>
        </div>
        <div id="footer" class="span12"><a href="http://themedesigner.in"></a> </div>
      </div><!--End-Chart-box--> 
  

    </div>


<!--end-Footer-part-->



<!-- =========== BAR CHART =========== -->
   <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Cantidad", { role: "style" } ],
        ["Enero", 8.94, "#b87333"],
        ["Febrero", 10.49, "silver"],
        ["Marzo", 19.30, "gold"],
         ["Abril",50.49, "blue"],
        ["Mayo", 16.30, "green"],
         ["Junio", 33.59, "orange"],
        ["Julio", 27.31, "black"],
         ["Agosto", 19.49, "red"],
          ["Septiembre", 30.49, "pink"],
        ["Octubre", 60.30, "purple"],
         ["Noviembre", 40.49, "silver"],
        ["Diciembre", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Produccion Mensual",
        width: 500,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
<!-- =========== BAR CHART ======| END |=====-->



<!-- =========== PIE CHART =========== -->
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Huevos Fertiles', 33],
          ['Huevos Rotos', 10],
          ['Huevos Doble Yema', 12],
          ['Huevos sucios', 17],
          
        ]);

        // Set chart options
        var options = {'title':'Postura De Huevos',
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<!-- =========== PIE CHART ======| END |=====-->

