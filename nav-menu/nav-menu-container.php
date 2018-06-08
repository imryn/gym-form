<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isSet($_SESSION['login']) && isSet($_SESSION['token']) &&  $_SESSION['token'] == $_SESSION['login']){
    if(isSet($_SESSION['userid'])){
        include "login-nav-menu.php";
    }
  
}
else{
    include "nav-menu.php";
}

?>