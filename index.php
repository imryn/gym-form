<!DOCTYPE html>
<html lang="he">
    <head>
            
        <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
                <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
                <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
                <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="css/style.css">
                <link rel="stylesheet" type="text/css" href="css/nav-menu.css">
                <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
                <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous"></script>
                <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
                <script src="vendors/bootstrap/js/bootpopup.min.js"></script>

        <title>Registration</title>
    </head>

    <body>
        <header>
           <?php include "nav-menu/nav-menu-container.php" ?>
        </header>
    <div class="container">
      <section id="registration-form">
            <form>
                <h1> Registration  </h1>
                <p class="describe-info"> Please fill in your personal details </p>
                <p class="success-message"></p>
                <div class="row gym-form">
                    <div class="col span-1-of-2 box">
                        <div class="registration-info">
                            <label class="gym-label"> <span> * </span> Choose Your Gender </label> <br>
                                        <select name="gender" size="1" id="gender-select" > 
                                                <option value="empty" selected> - Select - </option>
                                                <option value="man"> Man  </option>
                                                <option value="woman"> Woman </option>
                                        </select> 
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-2 box">
                        <div class="registration-info">
                            <label for="age" class="gym-label"> <span> * </span> Choose Your Age: </label>
                            <p> <input type="radio" name="agepref" value="20-24"> 20-26 </p>
                            <p> <input type="radio" name="agepref" value="20-24"> 27-33 </p>
                            <p> <input type="radio" name="agepref" value="20-24"> 34-40 </p>
                            <p> <input type="radio" name="agepref" value="20-24"> 40+ </p>                  
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="name" class="gym-label"> <span> * </span> First Name: </label>
                            <input name="firstname" type="text" required/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="name" class="gym-label"> <span> * </span> Last Name: </label>
                            <input name="lastname" type="text" required/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="id" class="gym-label"> <span> * </span> ID: </label> <br>
                            <input name="userid" type="text" required/>
                        </div> 
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="password" class="gym-label"> <span> * </span> Password: </label> <br>
                            <input name="password" type="password" id="password" required/>
                        </div> 
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="address"> City </label> <br>
                            <input name="addressuser" type="text"/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="email" class="gym-label"> <span> * </span> Email: </label> <br>
                            <input name="email" type="email" required/>
                        </div>
                    </div>
                </div>
                <div class="row gym-form">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="phone"> Phone </label> <br>
                            <input name="phonenumber" type="text"/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="hight" class="gym-label"> <span> * </span> Height: </label> <br>
                            <input name="hight" type="text" required/>
                        </div> 
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="weight" class="gym-label"> <span> * </span> Weight: </label> <br>
                            <input name="weight" type="text" required/>
                        </div> 
                    </div>
                </div>

            <button type="button" class="save-1 btn btn-primary" onClick="createParentUser()"> Save</button>   
        </form> 
     </section>
</div>
        <script src="commons.js"></script>
        <script src="main.js"></script>
       

            <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet . All rights reserved </p>
                </div>
            </footer>        
    </body>

</html>