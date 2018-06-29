<!DOCTYPE html>
<html lang="he">
    <head>
            
        <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
                <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
                <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
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

        <title>Recommendations For Trainee</title>
    </head>

    <body>
        <header>
          <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

    <div class="container">
        <section id="gym-recommendation">

            <h1> Recommendations For Trainee </h1>
            <div>
                <form  method="GET" id="bmi" action="<?php ($_SERVER["PHP_SELF"]);?>">
                    <u> <b> BMI Calculator <b> </u> <br> <br>
                    <label for="height"> Height: </label>
                    <input type="text" id="height" name="height">
                    <label for="weight"> Weight: </label>
                    <input type="text" id="weight" name="weight">
                    <br>

                    <input type="submit" value="Calc" class="save-1 btn btn-primary">
                </form>
            </div>

            <?php
                require_once 'Src/Unirest.php';
                
                if(isset($_GET['height'], $_GET['weight'])){
                    $headers = array("X-Mashape-Key" => "tMht3TOaWwmshYnJhPVM3xX9PWUPp1sf1Rljsnodwzz64Kl7BT","Accept" => "application/json");
                    
                    $response = Unirest\Request::GET("https://gabamnml-health-v1.p.mashape.com/bmi?height=".urlencode($_GET["height"])."&weight=".urlencode($_GET["weight"]), $headers);                     
                    
                    $result = $response->body->result;
                    $status = $response->body->status;              
                }
            ?>

            <div style="margin: 0 auto; text-align:left; color: black;">
                <p> Your BMI is: <?php if(isset($_GET['height'], $_GET['weight'])){echo(round($result));} ?> </p>
                <p> Status: <?php if(isset($_GET['height'], $_GET['weight'])){echo $status ;} ?> </p>
            </div> 
        </section>
    </div>
    
              <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet . All rights reserved </p>
                </div>
            </footer>      
    </body>

</html>