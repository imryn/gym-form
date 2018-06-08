<?php

       include 'new-user.php';
       
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
            }
       }
       
       else if($method == "GET" &&  isSet($_GET['route']) ){
           switch ($_GET['route']) {
                case "signout":
                 if(isset( $_SESSION['parentId'])){
                    session_destroy();
                    header("Location: /Sadna/login_page.php?usertype=parent");
                 }
                 else{
                    session_destroy();
                    header("Location: /Sadna/login_page.php?usertype=crew");
                 }
                 setcookie("loginType", "", time()-3600,"/"); 
                 break;
            }
       }
       else{
           echo "no find any route";
       }
?>

