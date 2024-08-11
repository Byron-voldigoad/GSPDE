<?php include("parcial/headear.php") ?>

<?php
  $con = mysqli_connect("localhost","root","","charts");
  if($con){
    echo "connected";
  }
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['students', 'contribution'],
            <?php
         $sql = "SELECT * FROM contribution where id=1";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['student']."',".$result['contribution']."],";
          }

         ?>
        ]);

        var options = {
            title: 'Students and their contribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart2.draw(data, options);
    }
    </script>
</head>

<body>
    <div class="kt-portlet">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
    <div class="kt-portlet">
        <div id="piechart2" style="width: 900px; height: 500px;"></div>
    </div>
</body>
<script src="JS/Date.js"></script>

</html>


<?php include("parcial/script.php") ?>