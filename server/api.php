<?php

       include 'new-user.php';
       include 'questions.php';
       
       $method = $_SERVER['REQUEST_METHOD'];

       if( $method == "POST" && isSet($_POST['route']) ){
           switch ($_POST['route']) {
                case "create_user":
                    $user = new Users();
                    $user->createUser();

                    $user->createstatus();
                    break;
              

                case "login":
                    $user = new Users();
                    $user->login();   
                    break;
                
                case "create_answers_form":
                    $question = new Questions();
                    $question->createQuestionsFormForUser();
                    break;

                case "save_answers_form":
                    $question = new Questions();
                    $question->createQuestionsFormForUser();
                    break;
                
                // case "update_answers_form":
                    
                //     $question = new Questions();
                //     $question->updateQuestionsFormForUser();
                //     break;
                
             
            }
       }
       
       else if($method == "GET" &&  isSet($_GET['route']) ){
           switch ($_GET['route']) {
                case "signout":
                 if(isset( $_SESSION['userid'])){
                    session_destroy();
                    header("Location: /gym-form/login_page.php");
                 }
                 break;

                 case "disabledform":
                    $question = new Questions();
                    $question->finalForm();
                 break;

                 case "user_recommendation":
                    $user = new Users();
                    $user->recommendationForUser();
                 break;

                case "MeCompareOthers":
                    $user = new Users();
                    $user->MeCompareOthers();
                    break;
            }
       }

       else{
           echo "no find any route";
       }
?>

