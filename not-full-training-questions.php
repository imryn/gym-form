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

        <title> Final Trainee Questionnaire</title>
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
                            <label for="sporttypes" class="gym-label"> <span> * </span> 1. What kind of sport do you practice?  </label> </br>
                            <input type="checkbox" name="bicycle" value="1" <?php if( isSet($_GET['bicycle']) ) echo $_GET['bicycle'] == "1" ? 'checked' : '' ?>> Riding a bicycle </p>
                            <input type="checkbox" name="gymsport" value="1" <?php if( isSet($_GET['gymsport']) ) echo $_GET['gymsport'] == "1" ? 'checked' : '' ?>> Work out in the gym </p>
                            <input type="checkbox" name="martialarts" value="1" <?php if( isSet($_GET['martialarts']) ) echo $_GET['martialarts'] == "1" ? 'checked' : '' ?>> Martial arts </p>
                            <input type="checkbox" name="game" value="1" <?php if( isSet($_GET['game']) ) echo $_GET['game'] == "1" ? 'checked' : '' ?>> Playing football, basketball, handball etc. </p>
                            <input type="checkbox" name="running" value="1" <?php if( isSet($_GET['running']) ) echo $_GET['running'] == "1" ? 'checked' : '' ?>> Running </p>
                            <input type="checkbox" name="swimming" value="1" <?php if( isSet($_GET['swimming']) ) echo $_GET['swimming'] == "1" ? 'checked' : '' ?>> Swimming </p>

                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainingfrequency" class="gym-label"> <span> * </span> 2. How many times do you practice a month? </label>
                            <p> <input type="radio" name="training_frequency" value="1-3 times" <?php if( isSet($_GET['training_frequency']) ) echo $_GET['training_frequency'] == "1-3 times" ? 'checked' : '' ?>> 1-3 times </p>
                            <p> <input type="radio" name="training_frequency" value="4-7 times" <?php if( isSet($_GET['training_frequency']) ) echo $_GET['training_frequency'] == "4-7 times" ? 'checked' : '' ?>> 4-7 times </p>
                            <p> <input type="radio" name="training_frequency" value="8-11 times" <?php if( isSet($_GET['training_frequency']) ) echo $_GET['training_frequency'] == "8-11 times" ? 'checked' : '' ?>> 8-11 times </p>
                            <p> <input type="radio" name="training_frequency" value="11+" <?php if( isSet($_GET['training_frequency']) ) echo $_GET['training_frequency'] == "11+" ? 'checked' : '' ?> > 11+ </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainingfavoritetime" class="gym-label"> <span> * </span> 3. What is the most effective time for training? </label>
                            <p> <input type="radio" name="training_favorite_time" value="early morning" <?php if( isSet($_GET['training_favorite_time']) ) echo $_GET['training_favorite_time'] == "early morning" ? 'checked' : '' ?>> Early morning </p>
                            <p> <input type="radio" name="training_favorite_time" value="morning" <?php if( isSet($_GET['training_favorite_time']) ) echo $_GET['training_favorite_time'] == "morning" ? 'checked' : '' ?>> Morning </p>
                            <p> <input type="radio" name="training_favorite_time" value="noon" <?php if( isSet($_GET['training_favorite_time']) ) echo $_GET['training_favorite_time'] == "noon" ? 'checked' : '' ?>> Noon </p>
                            <p> <input type="radio" name="training_favorite_time" value="afternoon" <?php if( isSet($_GET['training_favorite_time']) ) echo $_GET['training_favorite_time'] == "afternoon" ? 'checked' : '' ?>> Afternoon </p>
                            <p> <input type="radio" name="training_favorite_time" value="night" <?php if( isSet($_GET['training_favorite_time']) ) echo $_GET['training_favorite_time'] == "night" ? 'checked' : '' ?>> Night </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="goal" class="gym-label"> <span> * </span> 4. What is your goal for trainning? </label>
                            <p> <input type="checkbox" name="balance" value="1" <?php if( isSet($_GET['balance']) ) echo $_GET['balance'] == "1" ? 'checked' : '' ?>> Balance </p>
                            <p> <input type="checkbox" name="cardio" value="1" <?php if( isSet($_GET['cardio']) ) echo $_GET['cardio'] == "1" ? 'checked' : '' ?>> Cardio </p>
                            <p> <input type="checkbox" name="shaping_and_toning" value="1" <?php if( isSet($_GET['shaping_and_toning']) ) echo $_GET['shaping_and_toning'] == "1" ? 'checked' : '' ?>> Shaping and toning </p>
                            <p> <input type="checkbox" name="weight_loss" value="1" <?php if( isSet($_GET['weight_loss']) ) echo $_GET['weight_loss'] == "1" ? 'checked' : '' ?>> Weight loss </p>
                            <p> <input type="checkbox" name="goal" value="1" <?php if( isSet($_GET['goal']) ) echo $_GET['goal'] == "1" ? 'checked' : '' ?>> All </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="trainningmanner" class="gym-label"> <span> * </span> 5. Who or where do you practice ? </label>
                            <p> <input type="radio" name="trainning_manner" value="alone" <?php if( isSet($_GET['trainning_manner']) ) echo $_GET['trainning_manner'] == "alone" ? 'checked' : '' ?>> Alone </p>
                            <p> <input type="radio" name="trainning_manner" value="with personal trainer" <?php if( isSet($_GET['trainning_manner']) ) echo $_GET['trainning_manner'] == "with personal trainer" ? 'checked' : '' ?>> With a personal trainer </p>
                            <p> <input type="radio" name="trainning_manner" value="with a friend" <?php if( isSet($_GET['trainning_manner']) ) echo $_GET['trainning_manner'] == "with a friend" ? 'checked' : '' ?>> With a friend </p>
                            <p> <input type="radio" name="trainning_manner" value="in a studio" <?php if( isSet($_GET['trainning_manner']) ) echo $_GET['trainning_manner'] == "in a studio" ? 'checked' : '' ?>> In a Studio </p>
                            <p> <input type="radio" name="trainning_manner" value="in a group" <?php if( isSet($_GET['trainning_manner']) ) echo $_GET['trainning_manner'] == "in a group" ? 'checked' : '' ?>> In a group </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="name" class="gym-label"> <span> * </span> 6. Does practice cost you money? </label>
                            <p> <input type="radio" name="trainning_cost" value="yes" <?php if( isSet($_GET['trainning_cost']) ) echo $_GET['trainning_cost'] == "yes" ? 'checked' : '' ?>> Yes </p>
                            <p> <input type="radio" name="trainning_cost" value="no"  <?php if( isSet($_GET['trainning_cost']) ) echo $_GET['trainning_cost'] == "no" ? 'checked' : '' ?>> No </p>
                            <p> <input type="radio" name="trainning_cost" value="depends on the kind of trainning"  <?php if( isSet($_GET['trainning_cost']) ) echo $_GET['trainning_cost'] == "depends on the kind of trainning" ? 'checked' : '' ?>> Depsends on the kind of trainning </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                        <label for="name" class="gym-label"> <span> * </span> 7. What do you eat before training? </label>
                            <p> <input type="radio" name="food" value="fruit" <?php if( isSet($_GET['food']) ) echo $_GET['food'] == "fruit" ? 'checked' : '' ?>> Fruit </p>
                            <p> <input type="radio" name="food" value="vegetable" <?php if( isSet($_GET['food']) ) echo $_GET['food'] == "vegetable" ? 'checked' : '' ?>> Vegetable </p>
                            <p> <input type="radio" name="food" value="bigmeal" <?php if( isSet($_GET['food']) ) echo $_GET['food'] == "bigmeal" ? 'checked' : '' ?>> Big meal </p>
                            <p> <input type="radio" name="food" value="smallmeal" <?php if( isSet($_GET['food']) ) echo $_GET['food'] == "smallmeal" ? 'checked' : '' ?>> A Small meal </p>
                            <p> <input type="radio" name="food" value="energysnack" <?php if( isSet($_GET['food']) ) echo $_GET['food'] == "energysnack" ? 'checked' : '' ?>> Energy snack </p>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">
                            <label for="name" class="gym-label"> <span> * </span> 8. Are you satisfied with your weight? </label>
                                <p> <input type="radio" name="trainning_satisfied" value="yes" <?php if( isSet($_GET['trainning_satisfied']) ) echo $_GET['trainning_satisfied'] == "yes" ? 'checked' : '' ?>> Yes </p>
                                <p> <input type="radio" name="trainning_satisfied" value="no" <?php if( isSet($_GET['trainning_satisfied']) ) echo $_GET['trainning_satisfied'] == "no" ? 'checked' : '' ?>> No </p>
                        </div>
                    </div>
                </div>
                <p class="describe-info"> Please answer following question only if you work out in the gym: </p>
                <div class="row gym-form">
                    <div class="col span-1-of-1 box">
                        <div class="registration-info">        
                            <label for="sportgymtypes" class="gym-label"> <span> * </span> 9. What kind of exercises are you doing at the gym?  </label>
                            <p> <input type="radio" name="unoraerobic_exercises" value="aerobic" <?php if( isSet($_GET['unoraerobic_exercises']) ) echo $_GET['unoraerobic_exercises'] == "aerobic" ? 'checked' : '' ?>> Aerobic exercises like mountaineering, using dalygit, bear walking, adjacent and getting up.</p>
                            <p> <input type="radio" name="unoraerobic_exercises" value="unaerobic" <?php if( isSet($_GET['unoraerobic_exercises']) ) echo $_GET['unoraerobic_exercises'] == "unaerobic" ? 'checked' : '' ?>> Unaerobic exercises like push ups, scots, angels, crunches, weight lifting, shoulder thrust. </p>
                            <p> <input type="radio" name="unoraerobic_exercises" value="both" <?php if( isSet($_GET['unoraerobic_exercises']) ) echo $_GET['unoraerobic_exercises'] == "both" ? 'checked' : '' ?>> Both </p>
                        </div>
                    </div>
                </div>
            <input type="hidden" name="route" value="update_answers_form">
            <input type="hidden" name="route" value="save_answers_form">       
       
            <button type="submit" class="save-1 btn btn-primary"> Save</button>
            <button type="submit" class="save-1 btn btn-primary"> Update </button>   
   
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