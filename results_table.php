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

        <title> Results Table</title>
    </head>

    <body>
        <header>
          <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <div class="container">
            <section id="gym-questions">
                <h1> Results Table </h1>
                <div class="error">
                        <?php 
                        if( isSet($_GET['error-message']) ){
                            echo $_GET['error-message'];
                        }
                        ?>
                </div>

                <form>
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

                                <tr>
                                    <td>  <?php if( isSet($_GET['lastname']) )echo $_GET['lastname']; ?>
                                          <?php  if( isSet($_GET['firstname']) )echo $_GET['firstname']; ?> 
                                    </td> 
                                    <td>  <?php if( isSet($_GET['agepref']) ) echo $_GET['agepref']; ?> </td>
                                    <td>  <?php  if( isSet($_GET['gender']) ) echo $_GET['gender']; ?> </td>
                                    <td>  <?php                                     
                                           if( isSet($_GET['bicycle']) && $_GET['bicycle']=="1") echo 'Bicycle <br>'; 
                                           
                                           if( isSet($_GET['gymsport']) && $_GET['gymsport']=="1") echo 'Gym sport <br>';
                                           
                                           if( isSet($_GET['martialarts']) && $_GET['martialarts']=="1") echo 'Martial arts <br>';

                                           if( isSet($_GET['game']) && $_GET['game']=="1") echo 'Game <br>';

                                           if( isSet($_GET['running']) && $_GET['running']=="1") echo 'Running <br>';

                                           if( isSet($_GET['swimming']) && $_GET['swimming']=="1") echo 'swimming <br>';
                                           ?>
                                    </td>
                                    <td> <?php if( isSet($_GET['training_frequency'])) echo $_GET['training_frequency']; ?> </td>
                                    <td> <?php if( isSet($_GET['training_favorite_time'])) echo $_GET['training_favorite_time']; ?> </td> 
                                    <td> <?php
                                            if( isSet($_GET['balance']) && $_GET['balance']=="1") echo 'Balance <br>';

                                            if( isSet($_GET['cardio']) && $_GET['cardio']=="1") echo 'cardio <br>';
                                           
                                            if( isSet($_GET['shaping_and_toning']) && $_GET['shaping_and_toning']=="1") echo 'Shaping and toning <br>';

                                            if( isSet($_GET['weight_loss']) && $_GET['weight_loss']=="1") echo 'Weight loss <br>';

                                            if( isSet($_GET['goal']) && $_GET['goal']=="1") echo 'All <br>';
                          
                                          ?> 
                                    </td>
                                    <td>  <?php if(isSet($_GET['trainning_manner'])) echo $_GET['trainning_manner']; ?> </td>
                                    <td>  <?php if(isSet($_GET['trainning_cost'])) echo $_GET['trainning_cost'];  ?>  </td>
                                    <td>  <?php if(isSet($_GET['food'])) echo $_GET['food']; ?> </td>
                                    <td>  <?php if(isSet($_GET['trainning_satisfied'])) echo $_GET['trainning_satisfied']; ?> </td>
                                    <td>  <?php if(isSet($_GET['unoraerobic_exercises'])) echo $_GET['unoraerobic_exercises']; ?> </td>
 
                                </tr>
   
                    </table>
                </form>
            </section>
        </div>
        
        <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet. All rights reserved </p>
                </div>
        </footer>       
    </body>

</html>