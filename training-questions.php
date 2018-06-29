<?php
    include 'server/new-user.php';
    $user = new Users();
    if( !$user->isLogin() ) {
        header('location:index.php');
    }
?>

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

        <title> Trainee Questionnaire</title>
    </head>

    <body>
        <header>
          <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

    <div class="container">
      <section id="gym-questions">
            <form  action="/gym-form/server/api.php" method="post">
                <h1> Trainee Questionnaire  </h1>
                <div class="error">
                    <?php 
                    if( isSet($_GET['error-message']) ){
                        echo $_GET['error-message'];
                    }
                     ?>
                </div>
                <p class="describe-info"> Please fill the form to get your training suggestion: </p>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                            <label for="sporttypes" class="gym-label"> <span> * </span> What kind of sport do you practice?  </label>
                            <p> <input type="checkbox" name="bicycle" value="1"> Riding a bicycle </p>
                            <p> <input type="checkbox" name="gymsport" value="1"> Work out in the gym </p>
                            <p> <input type="checkbox" name="martialarts" value="1"> Martial arts </p>
                            <p> <input type="checkbox" name="game" value="1"> Playing football, basketball, handball etc. </p>             
                            <p> <input type="checkbox" name="running" value="1"> Running </p>
                            <p> <input type="checkbox" name="swimming" value="1"> Swimming </p>     
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainingfrequency" class="gym-label"> <span> * </span> How many times do you practice a month? </label>
                            <p> <input type="radio" name="training_frequency" value="1-3 times"> 1-3 times </p>
                            <p> <input type="radio" name="training_frequency" value="4-7 times"> 4-7 times </p>
                            <p> <input type="radio" name="training_frequency" value="8-11 times"> 8-11 times </p>
                            <p> <input type="radio" name="training_frequency" value="11+"> 11+ </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainingfavoritetime" class="gym-label"> <span> * </span> What is the most effective time for training? </label>
                            <p> <input type="radio" name="training_favorite_time" value="early morning"> Early morning </p>
                            <p> <input type="radio" name="training_favorite_time" value="morning"> Morning </p>
                            <p> <input type="radio" name="training_favorite_time" value="noon"> Noon </p>
                            <p> <input type="radio" name="training_favorite_time" value="afternoon"> Afternoon </p>
                            <p> <input type="radio" name="training_favorite_time" value="night"> Night </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="goal" class="gym-label"> <span> * </span> What is your goal for trainning? </label>
                            <p> <input type="checkbox" name="balance" value="1"> Balance </p>
                            <p> <input type="checkbox" name="cardio" value="1"> Cardio </p>
                            <p> <input type="checkbox" name="shaping_and_toning" value="1"> Shaping and toning </p>
                            <p> <input type="checkbox" name="weight_loss" value="1"> Weight loss </p>
                            <p> <input type="checkbox" name="goal" value="1"> All </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainningmanner" class="gym-label"> <span> * </span> Who or where do you practice ? </label>
                            <p> <input type="radio" name="trainning_manner" value="alone"> Alone </p>
                            <p> <input type="radio" name="trainning_manner" value="with personal trainer"> With a personal trainer </p>
                            <p> <input type="radio" name="trainning_manner" value="with a friend"> With a friend </p>
                            <p> <input type="radio" name="trainning_manner" value="in a studio"> In a Studio </p>
                            <p> <input type="radio" name="trainning_manner" value="in a group"> In a group </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="name" class="gym-label"> <span> * </span> Does practice cost you money? </label>
                            <p> <input type="radio" name="trainning_cost" value="yes"> Yes </p>
                            <p> <input type="radio" name="trainning_cost" value="no"> No </p>
                            <p> <input type="radio" name="trainning_cost" value="depends on the kind of trainning"> Depsends on the kind of trainning </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="name" class="gym-label"> <span> * </span> What do you eat before training? </label>
                            <p> <input type="radio" name="food" value="fruit"> Fruit </p>
                            <p> <input type="radio" name="food" value="vegetable"> Vegetable </p>
                            <p> <input type="radio" name="food" value="bigmeal"> big meal </p>
                            <p> <input type="radio" name="food" value="smallmeal"> A Small meal </p>
                            <p> <input type="radio" name="food" value="energysnack"> Energy snack </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                            <label for="name" class="gym-label"> <span> * </span> Are you satisfied with your weight? </label>
                                <p> <input type="radio" name="trainning_satisfied" value="yes"> Yes </p>
                                <p> <input type="radio" name="trainning_satisfied" value="no"> No </p>
                        </div>
                    </div>
                </div>
                <p class="describe-info"> Please answer following questions only if you work out in the gym: </p>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">        
                            <label for="sportgymtypes" class="gym-label"> <span> * </span> What kind of exercises are you doing at the gym?  </label>
                            <p> <input type="radio" name="unoraerobic_exercises" value="aerobic"> Aerobic exercises like mountaineering, using dalygit, bear walking, adjacent and getting up.</p>
                            <p> <input type="radio" name="unoraerobic_exercises" value="unaerobic"> Unaerobic exercises like push ups, scots, angels, crunches, weight lifting, shoulder thrust. </p>
                            <p> <input type="radio" name="unoraerobic_exercises" value="both"> Both </p>
                        </div>
                    </div>
                </div>
            <input type="hidden" name="route" value="create_answers_form">       
            <button type="submit" class="save-1 btn btn-primary"> Save</button>   
        </form> 
    </section>
</div>  

              <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet . All rights reserved </p>
                </div>
            </footer>      
    </body>

</html>