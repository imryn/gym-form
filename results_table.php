<!DOCTYPE html>
<html lang="he">
    <?php 

        session_start();
        $servername = "us-cdbr-gcp-east-01.cleardb.net";
        $username = "b54a0834df827f";
        $password = "ba006edc";
        $dbname = "gcp_ac134926fbc5dc52c106";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "select *
                from users
                INNER JOIN questions ON users.userid=questions.userid
                where questions.questionnaire_status='1'
                order by lastname 
                ";
        
        
        $result = $conn->query($sql);

        $conn->close();
    ?>


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

        <title> Results Table</title>
    </head>

    <body>
        <header>
          <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <div class="container">
            <section id="gym-questions">
                <h1> Results Table </h1>
                <div class="error">
                        <?php 
                        if( isSet($_GET['error-message']) ){
                            echo $_GET['error-message'];
                        }
                        ?>
                </div>

                <form>
                    <table style="font-size:14px;" class="table table-striped">
                        <tr>
                            <th> Trainee Name </th>  
                            <th> Age </th>             
                            <th> Gender </th>
                            <th> Question 1 </th>
                            <th> Question 2 </th>
                            <th> Question 3 </th>
                            <th> Question 4 </th>
                            <th> Question 5 </th>
                            <th> Question 6 </th>
                            <th> Question 7 </th>
                            <th> Question 8 </th>
                            <th> Question 9 </th>
                        </tr>

                        <?php if ($result->num_rows > 0) 
                        {
                            // output data of each row
                            while($row = $result->fetch_assoc()) 
                            {?>
                                <tr>
                                    <td>  <?php echo $row['lastname']; ?>
                                          <?php  echo $row['firstname']; ?> 
                                    </td> 
                                    <td>  <?php echo $row['agepref']; ?> </td>
                                    <td>  <?php  echo $row['gender']; ?> </td>
                                    <td>  <?php                                     
                                            if($row['bicycle'] == "1")
                                                    echo 'Bicycle <br>'; 
                                            if($row['gymsport'] == "1")
                                                    echo 'Gym sport <br>' ;
                                            if( $row['martialarts'] == "1")
                                                    echo 'Martial arts <br>';
                                            if($row['game'] == "1")
                                                    echo 'Game <br>';
                                            if($row['running'] == "1")
                                                    echo 'Running <br>';
                                            if($row['swimming'] == "1")
                                                    echo 'Swimming';
                                          ?> 
                                    </td>
                                    <td> <?php echo $row['training_frequency']; ?> </td>
                                    <td> <?php echo $row['training_favorite_time'];?> </td> 
                                    <td> <?php 
                                            if($row['balance'] == "1")
                                                    echo 'Balance <br>';
                                            if($row['cardio'] == "1")
                                                    echo 'Cardio <br>';
                                            if($row['shaping_and_toning'] == "1")
                                                    echo 'Shaping and toning <br>';
                                            if($row['weight_loss'] == "1")
                                                    echo 'Weight loss <br>' ;
                                            if($row['goal'] == "1")
                                                    echo 'All';                           
                                          ?> 
                                    </td>
                                    <td>  <?php echo $row['trainning_manner']; ?> </td>
                                    <td>  <?php echo $row['trainning_cost']; ?>  </td>
                                    <td>  <?php echo $row['food']; ?> </td>
                                    <td>  <?php echo $row['trainning_satisfied']; ?> </td>
                                    <td>  <?php echo $row['unoraerobic_exercises']; ?> </td>
 
                                </tr>
                            <?php    
                            }
                        }
                        ?>
                    </table>
                </form>
            </section>
        </div>
        
        <footer class="container-fluid text-center bg-lightblue">
                <div class="copyrights">
                <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Adi Tavet. All rights reserved </p>
                </div>
        </footer>       
    </body>

</html>