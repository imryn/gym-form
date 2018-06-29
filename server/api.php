<?php

       include 'new-user.php';
       include 'questions.php';
       
       $method = $_SERVER['REQUEST_METHOD'];

       if( $method == "POST" && isSet($_POST['route']) ){
           switch ($_POST['route']) {
                case "create_user":
                    $user = new Users();
                    $user->createUser();
                    break;

                case "login":
                    $user = new Users();
                    $user->login();   
                    break;
                
                case "create_answers_form":
                    $question = new Questions();
                    $question->createQuestionsFormForUser();
                    break;
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
            }
       }

       else{
           echo "no find any route";
       }
?>

