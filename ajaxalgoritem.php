<?php
    include 'server/new-user.php';
    $user = new Users();
    if( !$user->isLogin() ) {
        header('location:index.php');
    }
?>
                        <?php 
                            if( isSet($_GET['error-message']) ){
                                echo $_GET['error-message'];
                            }
                        ?>

                <?php 
                if(isSet($_GET['balance']) && $_GET['balance']=="1" || isSet($_GET['goal']) && $_GET['goal']=="1")
                {
                    echo 'Pilates and yoga will be very good for you. <br>'; 
                }   

                if( isSet($_GET['cardio']) && $_GET['cardio']=="1" || isSet($_GET['goal']) && $_GET['goal']=="1")
                {
                    echo 'Pool training will be great, at least 3 times a week.<br>'; 
                }
         
                if(isSet($_GET['agepref']) && $_GET['agepref']=="20-26"  && isSet($_GET['shaping_and_toning']) && $_GET['shaping_and_toning']=="1")
                {
                    echo 'Training at the gym and cycling 4 times a week are best for your goal. <br>'; 
                }
                if(isSet($_GET['agepref']) && $_GET['agepref']=="27-33"  && isSet($_GET['shaping_and_toning']) && $_GET['shaping_and_toning']=="1")
                {
                    echo 'Training at the gym and cycling 4 times a week are best for your goal. <br>'; 
                }
                if(isSet($_GET['agepref']) && $_GET['agepref']=="34-40"  && isSet($_GET['shaping_and_toning']) && $_GET['shaping_and_toning']=="1")
                {
                    echo 'Training at the gym and cycling 3 times a week are best for your goal. <br>'; 
                }
                if(isSet($_GET['agepref']) && $_GET['agepref']=="40+"  && isSet($_GET['shaping_and_toning']) && $_GET['shaping_and_toning']=="1")
                {
                    echo 'Training at the gym and cycling 2 times a week are best for your goal. <br>'; 
                }
              
                ?> 
                                           