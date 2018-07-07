<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isSet($_SESSION['login']) && isSet($_SESSION['token']) &&  $_SESSION['token'] == $_SESSION['login'])
    {
        //אמור להציג תפריט למתאמן שסיים את מילוי השאלון שלו
        if(isSet($_SESSION['userid']) && $_SESSION['questionnaire_status'] == '1')
        {
            include "finished-nav-menu.php";
        }

        //אמור להציג תפריט למתאמן שלאאאאאא סיים את השאלון שלו
       else if(isSet($_SESSION['userid']))
        {
            include "login-nav-menu.php";
        }
    
    }
else
    {
        include "nav-menu.php";
    }

?>