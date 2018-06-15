<?php 
    include 'server/token.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
            <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
            <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
            <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/login.css">
            <link rel="stylesheet" type="text/css" href="css/nav-menu.css">
            <link rel="stylesheet" type="text/css" href="css/queries.css">
            <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
            <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
            <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

    <title>Login</title>
</head>

<body>
<section id="login-section">
    <form action="/tihnot_zad_sharat/gym-form/server/api.php" method="post">
            <div id="playground-container">
	    
		<div class="col-md-10 col-md-offset-1 main" >
		    <div class="col-md-6 left-side" >
		        <br>
		    </div>
		
		<div class="col-md-6 right-side">
		<h3>Login</h3>
		
<div class="form">
        <div class="form-group">
		    <label for="form2">Your ID: </label>
            <input class= "form-control input-lg" name="userid" type="text" id="form2" placeholder="id" required>
        </div>

        <div class="form-group">
		    <label for="form4">Your password: </label>
            <input name="password" id="form4"  class="form-control input-lg" type="password" placeholder="password" required>
        </div>

        <div class="text-xs-center">
            <input type="hidden" name="route" value="login">
            <input type="hidden" name="token" value="<?php echo createToken()  ?>" >
            <button class="btn btn-primary" type="submit" >Login</button>
        </div>

</div>
		</div><!--col-sm-6-->
        </div><!--col-sm-8-->
        
        </div>
     </form>     
   </section>
    
</body>

</html>