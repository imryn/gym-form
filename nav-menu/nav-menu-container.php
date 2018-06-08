<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isSet($_SESSION['login']) && isSet($_SESSION['token']) &&  $_SESSION['token'] == $_SESSION['login']){
    if(isSet($_SESSION['parentId'])){
        include "login-nav-menu.php";
    }
    else if(isSet($_SESSION['kTeacherId'])){
        include "login-nav-menu-crew.php";
    }
}
else{
    include "nav-menu.php";
}

?>