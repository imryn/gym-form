<?php
    include 'server/new-user.php';
    $user = new Users();
    if( !$user->isLogin() ) {
        header('location:index.php');
    }
?>
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
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Num of trainers'],
          ['1-3 times',    <?php if( isSet($_GET['1-3times']) )  echo $_GET['1-3times'] ?>],
          ['4-7 times',      <?php if( isSet($_GET['4-7times']) ) echo $_GET['4-7times']?>],
          ['8-11 times',  <?php if( isSet($_GET['8-11times']) ) echo $_GET['8-11times']?>],
          ['11+',    <?php if( isSet($_GET['11plus']) ) echo $_GET['11plus']?>]
        ]);

        var options = {
          title: 'Num of practices By month'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Training', '20-26', '27-33', '34-40', '40+'],
         ['bicycle',<?php if( isSet($_GET['bic20to26']) ){  echo $_GET['bic20to26']; } else { echo '0';} ?> , <?php if( isSet($_GET['bic27to33']) ){  echo $_GET['bic27to33']; } else { echo '0';} ?> , <?php if( isSet($_GET['bic34to40']) ){  echo $_GET['bic34to40']; } else { echo '0';} ?> , <?php if( isSet($_GET['bic40plus']) ) echo $_GET['bic40plus'] == "" ? '0' : '' ?>],
         ['gym',<?php if( isSet($_GET['gym20to26']) ){  echo $_GET['gym20to26']; } else { echo '0';} ?> , <?php if( isSet($_GET['gym27to33']) ){  echo $_GET['gym27to33']; } else { echo '0';} ?> , <?php if( isSet($_GET['gym34to40']) ){  echo $_GET['gym34to40']; } else { echo '0';} ?> , <?php if( isSet($_GET['gym40']) ) echo $_GET['gym40'] == "" ? '0' : '' ?>],
         ['Martial arts',<?php if( isSet($_GET['arts20to26']) ){  echo $_GET['arts20to26']; } else { echo '0';} ?> , <?php if( isSet($_GET['arts27to33']) ){  echo $_GET['arts27to33']; } else { echo '0';} ?> , <?php if( isSet($_GET['arts34to40']) ){  echo $_GET['arts34to40']; } else { echo '0';} ?> , <?php if( isSet($_GET['arts40']) ) echo $_GET['arts40'] == "" ? '0' : '' ?>],
         ['Sports games',<?php if( isSet($_GET['game20to26']) ){  echo $_GET['game20to26']; } else { echo '0';} ?>, <?php if( isSet($_GET['game27to33']) ){  echo $_GET['game27to33']; } else { echo '0';} ?>,<?php if( isSet($_GET['game34to40']) ){  echo $_GET['game34to40']; } else { echo '0';} ?>, <?php if( isSet($_GET['game40']) ) echo $_GET['game40'] == "" ? '0' : '' ?>],
         ['Running',<?php if( isSet($_GET['run20to26']) ){  echo $_GET['run20to26']; } else { echo '0';} ?>, <?php if( isSet($_GET['run27to33']) ){  echo $_GET['run27to33']; } else { echo '0';} ?>,<?php if( isSet($_GET['run34to40']) ){  echo $_GET['run34to40']; } else { echo '0';} ?>, <?php if( isSet($_GET['run40']) ) echo $_GET['run40'] == "" ? '0' : '' ?>],
         ['Swimming', <?php if( isSet($_GET['swi20to26']) ){  echo $_GET['swi20to26']; } else { echo '0';} ?> , <?php if( isSet($_GET['swi27to33']) ){  echo $_GET['swi27to33']; } else { echo '0';} ?> , <?php if( isSet($_GET['swi34to40']) ){  echo $_GET['swi34to40']; } else { echo '0';} ?> ,<?php if( isSet($_GET['swi40']) ) echo $_GET['swi40'] == "" ? '0' : '' ?>]
      ]);

    var options = {
      title : 'Types of training by Age range',
      vAxis: {title: 'Num of trainers'},
      hAxis: {title: 'Training type'},
      seriesType: 'bars',
      series: {5: {type: 'bars'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
  </script>
    </script>
  </head>
  <body>
        <header>
           <?php include "nav-menu/nav-menu-container.php" ?>
        </header>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet . All rights reserved </p>
                </div>
            </footer>      
  </body>
</html>