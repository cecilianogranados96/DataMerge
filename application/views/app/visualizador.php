<?php defined('BASEPATH') OR exit('No direct script access allowed'); $limite = "limit 15"; ?>
<body id="page-top">
        <div class="container-fluid">
            <center>
          <h1 class="h3 mb-2 text-gray-800">Visualizador de datos</h1>
            </center>    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>Visualizador de datos</center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
   
                  
            
        <table border="2">
            <tr> 
                <td><div id="chart_div"></div></td>
                <td><div id="chart_div2"></div></td>
            </tr>
            <tr> 
                <td><div id="chart_div3"></div></td>
                <td><div id="chart_div4"></div></td>
            </tr>
                <tr> 
                <td colspan="2"><div id="chart_div5" style="width: 1000px; height: 500px;"></div></td>
              
            </tr>
            
                  </table>
     
                  
              </div>
            </div>
          </div>
        </div>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    
     <script type='text/javascript'>
     google.charts.load('current', {
       'packages': ['geochart'],
       // Note: you will need to get a mapsApiKey for your project.
       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
       'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
     });
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['Ciudad',   'Alfabetismo','Analfabetismo'],
           <?php
                $arreglo = "";
                $this->load->database();
                $query = $this->db->query("SELECT * FROM `data_analfabetismo`");
                $datos = $query->result();

                foreach($datos as $row) {
                    $arreglo .= "['".$row->Canton."',".$row->Alfabetismo_Ambos.",".$row->Analfabetismo_Ambos."],";
                }  
                $arreglo = substr($arreglo , 0, -1 );
                echo $arreglo;
            ?>
      ]);
      var options = {
        region: 'CR',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div5'));
      chart.draw(data, options);
    };
    </script>
        

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawChart3);
        google.charts.setOnLoadCallback(drawChart4);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Total_Ambos."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Analfabetización Total','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      function drawChart2() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Analfabetismo_Ambos."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Analfabetización Total','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
      function drawChart3() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Total_Mujeres."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Alfabetización Mujeres','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
      function drawChart4() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Alfabetismo_Ambos."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Alfabetización Hombres','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
        
      function drawChart6() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Total_Mujeres."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Analfabetismo Mujeres','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
      function drawChart7() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([       
            <?php
                    $arreglo = "";
                    $this->load->database();
                    $query = $this->db->query("SELECT * FROM `data_analfabetismo` $limite");
                    $datos = $query->result();
                        $arreglo = "";
                    foreach($datos as $row) {
                        $arreglo .= "['".$row->Canton."',".$row->Alfabetismo_Ambos."],";
                    }  
                        $arreglo = substr($arreglo , 0, -1 );
                    echo $arreglo;
            ?>]);
        var options = {'title':'Analfabetismo Hombres','width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd7j4FP2rn0BdGj5XAK_1dvTjnRkwwaoU&callback=initMap">
    </script>
  