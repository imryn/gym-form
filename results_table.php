<?php
    include 'server/new-user.php';
    $user = new Users();
    if( !$user->isLogin() ) {
        header('location:index.php');
    }

    $data = $user->makeResulttable();
?>

<!DOCTYPE html>
<html>
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
                
        <title> Results</title>
    </head>

    <body>
        <header>
          <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <div class="container">
            <section id="gym-questions">
                <h1> Results </h1>
                <div class="error">
                        <?php 
                            if( isSet($_GET['error-message']) ){
                                echo $_GET['error-message'];
                            }
                        ?>
                </div>

                <div>
                    <form>
                        Let us offer you the best practice for you (according to your age range and goal): <br>
              
                        <input type="button" id='morButton' value="Click to know" class="save-1 btn btn-primary">
                        <div id="morText"></div>
                        <p>

                        </p>
                    </form>
                </div>
                    <table style="font-size:14px;" class="table table-striped">
                        <tr>
                            <th> Trainee Name </th>  
                            <th> Age </th>             
                            <th> Gender </th>
                            <th> Question 1 </th>
                            <th> Question 2 </th>
                            <th> Question 3 </th>
                            <th> Question 4 </th>
                            <th> Question 5 </th>
                            <th> Question 6 </th>
                            <th> Question 7 </th>
                            <th> Question 8 </th>
                            <th> Question 9 </th>
                        </tr>
                         
                        <?php
                        
                            $string = "";
                            if($data && count($data) > 0){
                                foreach ($data as $row){

                                    $bicycle = $row['bicycle'] == '1' ? 'Bicycle <br>' : '';
                                    $gymsport = $row['gymsport'] == '1' ? 'Gym sport <br>' : '';
                                    $martialarts = $row['martialarts'] == '1' ? 'Martial arts <br>' : '';
                                    $game = $row['game'] == '1' ? 'Game <br>' : '';
                                    $running = $row['running'] == '1' ? 'Running <br>' : '';
                                    $swimming = $row['swimming'] == '1' ? 'Swimming <br>' : '';

                                    $exerciseType = $bicycle . $gymsport .$martialarts. $game . $running.  $swimming;

                                    $balance = $row['balance'] == '1' ? 'Balance <br>' : '';
                                    $cardio = $row['cardio'] == '1' ? 'Cardio <br>' : '';
                                    $shaping_and_toning = $row['shaping_and_toning'] == '1' ? 'Shaping and toning <br>' : '';
                                    $weight_loss = $row['weight_loss'] == '1' ? 'Weight loss <br>' : '';
                                    $all = $row['goal'] == '1' ? 'All <br>' : '';

                                    $workoutReason = $balance . $cardio .$shaping_and_toning. $weight_loss . $all;
                                    $string = $string .'<tr>';
                                    $string = $string .    '<td>'.$row['lastname'] .' '.$row['firstname'].'</td>';
                                    $string = $string .    '<td>'.$row['agepref'] .'</td>';
                                    $string = $string .    '<td>'.$row['gender'] .'</td>';
                                    $string = $string .    '<td>'.$exerciseType.'</td>';
                                    $string = $string .    '<td>'.$row['training_frequency'].'</td>';
                                    $string = $string .    '<td>'.$row['training_favorite_time'].'</td>';
                                    $string = $string .    '<td>'.$workoutReason.'</td>';
                                    $string = $string .    '<td>'.$row['trainning_manner'].'</td>';
                                    $string = $string .    '<td>'.$row['trainning_cost'].'</td>';
                                   
                                    $string = $string .    '<td>'.$row['food'].'</td>';
                                    $string = $string .    '<td>'.$row['trainning_satisfied'].'</td>';
                                    $string = $string .    '<td>'.$row['unoraerobic_exercises'].'</td>';
                                    $string = $string . '</tr>';

                                }
                                echo $string;
                            }
                          ?>
                       

                    </table>
               
            </section>
        </div>

       
        <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet. All rights reserved </p>
                </div>
        </footer>      
            
    <script>
        $("#morButton").click(function(){
            var params = location.href.toString().split('?')[1]
            $.ajax({
            url: "/gym-form/ajaxalgoritem.php?" +params,
            context: document.body,
            type:'text',
            }).done(function(text) {
                $("#morText").html(text)
            });
        })
    </script>
    </body>

</html>