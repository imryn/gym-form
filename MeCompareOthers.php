<!DOCTYPE html>
    <html>
    <head> 
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
                <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
                <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="css/style.css">
                <link rel="stylesheet" type="text/css" href="css/nav-menu.css">
                <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
                <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous"></script>
                <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
                <script src="vendors/bootstrap/js/bootpopup.min.js"></script>

        <title>MeCompareOthers</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'My Answer', 'Avg'],
         ['bicycle',  <?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,2.05],
         ['Work out in the gym',<?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,2],
         ['Martial arts',<?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,1.8],
         ['Games',<?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,1.9],
         ['Running',<?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,1.8],
         ['Swimming',<?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle']?>,2]
      ]);

    var options = {
      title : 'Monthly Coffee Production by Country',
      vAxis: {title: 'Cups'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {1: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
  </head>
  <body>
        <header>
           <?php include "nav-menu/nav-menu-container.php" ?>
        </header>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet . All rights reserved </p>
                </div>
            </footer>      
  </body>
</html>