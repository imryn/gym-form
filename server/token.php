<?php 

session_start();

function createToken(){
    $_SESSION['token'] = rand(1000,10000);
    return $_SESSION['token'];
}
?>