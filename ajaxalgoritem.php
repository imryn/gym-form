<?php
    include 'server/new-user.php';
    $user = new Users();
    if( !$user->isLogin() ) {
        header('location:index.php');
    }
?>

<?php 
 if(isSet($_GET['agepref']) && $_GET['agepref']=="27-33" && isSet($_GET['balance']) && $_GET['balance']=="1" )
  {
    echo 'Very Good'; 
 }
?> 
                                           