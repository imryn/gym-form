<?php

    require_once('db.php');
    session_start();

    class Users{

        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function allowSpecialCharacters($method){
            foreach( $method as $key => $value ) {
                     $method[$key] = strip_tags($this->db->real_escape_string($value));
            }
        }

        private function error(){
            echo json_encode((object) [
                'error'=>true
            ]);
        }
       
        public function createUser(){
            
            $this->allowSpecialCharacters($_POST);
            
            $error = "";
            if(empty($_POST['gender'])){
                $error = "No gender was selected";
            }
            else if(empty($_POST['agepref'])){
                $error = "No age prefrence was selected";
            }
            else if (empty($_POST['firstname'])){
                $error = "No first name was entered"; 
            }
            else if(empty($_POST['lastname'])){
                $error = "No last name was entered"; 
            }
            else if(empty($_POST['userid']) && strlen($_POST['userid'])==9){
                $error = "ID field must contain 9 digits"; 
            }
            else if(empty($_POST['password'])){
                $error = "No password was entered"; 
            }
            else if(empty($_POST['city'])){
                $error = "No city was entered";
            }
            else if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error = "Email address is already in use or invalid";
            }
            else if(empty($_POST['phonenumber'])){
                $error = "Phone number is invalid";
            }
            else if(empty($_POST['height'])){
                $error = "You can't send the form without sending height";
            }
            else if(empty($_POST['weight'])){
                $error = "You can't send the form without sending weight";
            }
            if(!empty($error)){
                header("Location:/gym-form/index.php?error-message=$error");
            }

            else{
                $password = md5($_POST['password']);
                $values = "'{$_POST['gender']}','{$_POST['agepref']}','{$_POST['firstname']}','{$_POST['lastname']}',{$_POST['userid']},
                '{$password}','{$_POST['city']}','{$_POST['email']}','{$_POST['phonenumber']}',{$_POST['height']},{$_POST['weight']}";

                $sql = "INSERT INTO users (gender,agepref,firstname,lastname,userid,
                password,city,email,phonenumber,height,weight) VALUES ($values)";
            
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
                    header("Location: /gym-form/index.php?error-message=Form was saved!");
              
                }
               
            } 
         
        }

         public function login(){
            if( isSet($_SESSION['token']) && isSet($_POST['token']) && $_SESSION['token'] == $_POST['token']){
                $password = md5($_POST['password']);
                $this->allowSpecialCharacters($_POST);
                $sql = "SELECT userid FROM users WHERE userid='{$_POST['userid']}' AND password ='{$password}'";
                $result = $this->db->query($sql);
                if(mysqli_num_rows($result) > 0 ){
                    $_SESSION['login'] = $_POST['token'];
                    $_SESSION['userid'] = $_POST['userid'];

                    $sql = "SELECT questions.userid
                    FROM questions
                    WHERE questions.userid='{$_SESSION['userid']}'
                    AND questions.questionnaire_status='1'";

                    $result = $this->db->query($sql);

                     if(mysqli_num_rows($result) > 0 ){
                        $this->sendtoNotFullform(); 
                     }

                     else{
                        header("Location: /gym-form/not-full-training-questions.php");
                       }             
                }
                else{
                    header("Location: /gym-form/login_page.php");
                }
            }
            else{
                header("Location: /gym-form/login_page.php");
            }
        }

        public function isLogin() {
            if(!empty( $_SESSION['userid'] )) {
                return true;
            }
            return false;
        }

        public function sendtoNotFullform() {
            $sql = "SELECT * FROM questions WHERE userid ='{$_SESSION['userid']}'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/not-full-training-questions.php?bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&swimming={$row['swimming']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}");
            }
        }

        public function makeResulttable(){
            $sql = "SELECT *
            FROM users
            INNER JOIN questions ON users.userid=questions.userid
            WHERE questions.questionnaire_status='1'
            ORDER BY lastname";

            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/results_table.php?firstname={$row['firstname']}&lastname={$row['lastname']}&agepref={$row['agepref']}&gender={$row['gender']}&bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&swimming={$row['swimming']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}");
            }
        }
        
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

