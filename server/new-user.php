<?php

    require_once('db.php');
    session_start();

    class Users{


        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
            // $this->_questions = new Questions();
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
                        $_SESSION['questionnaire_status'] ='1';
                        $this->finalForm();
                     }

                     else{
                        $_SESSION['questionnaire_status'] ='0';
                        $this->sendtoNotFullform();
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

        public function createstatus(){

            $sql = "INSERT INTO questions (questionnaire_status ,userid) VALUES('0','{$_POST['userid']}')";

            $result =$this->db->query($sql);
        }

        public function sendtoNotFullform() {
            $sql = "SELECT * FROM questions WHERE userid ='{$_SESSION['userid']}'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/not-full-training-questions.php?bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&swimming={$row['swimming']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}");
            }
        }

        public function finalForm(){
            $sql = "SELECT * FROM questions WHERE userid ='".$_SESSION['userid'] ."'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) >0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/disabled-training-questions.php?bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&swimming={$row['swimming']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}");
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
                while ($row = $result->fetch_assoc() ) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }
        public function MeCompareOthers(){
            $sql="SELECT training_frequency FROM questions WHERE training_frequency AND questionnaire_status='1'";
            $result =$this->db->query($sql);
            $One2Three=0;
            $Four2Seven=0;
            $Eight2Eleven=0;
            $Elevenplus=0;
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if( $row['training_frequency']=='1-3 times') {
                        $One2Three++;
                    }
                    if ($row['training_frequency']=='4-7 times'){ 
                        $Four2Seven++;  
                    }
                    if ($row['training_frequency']=='8-11 times'){ 
                        $Eight2Eleven++;  
                    }
                    if ($row['training_frequency']=='11+'){ 
                        $Elevenplus++;  
                    }
                }   
            }
            $sql="SELECT agepref,bicycle FROM users INNER JOIN questions ON users.userid=questions.userid WHERE bicycle='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $bic20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $bic27to33++;
                    }
                    if($row['agepref']=='34-40'){
                    $bic34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $bic40plus++;
                    }
                }
            }
            $sql="SELECT agepref,gymsport FROM users INNER JOIN questions ON users.userid=questions.userid WHERE gymsport='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $gym20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $gym27to33++;
                    }
                    if($row['agepref']=='34-40'){
                    $gym34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $gym40++;
                    }
                }
            }
            $sql="SELECT agepref,martialarts FROM users INNER JOIN questions ON users.userid=questions.userid WHERE martialarts='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) { 
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $arts20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $arts27to34++;
                    }
                    if($row['agepref']=='34-40'){
                    $arts34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $arts40++;
                    }
                }
            }
            $sql="SELECT agepref,game FROM users INNER JOIN questions ON users.userid=questions.userid WHERE game='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $game20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $game27to33++;
                    }
                    if($row['agepref']=='34-40'){
                    $game34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $game40++;
                    }
                }
            }
            $sql="SELECT agepref,running FROM users INNER JOIN questions ON users.userid=questions.userid WHERE running='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $run20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $run27to33++;
                    }
                    if($row['agepref']=='34-40'){
                    $run34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $run40++;
                    }
                }
            }
            $sql="SELECT agepref,swimming FROM users INNER JOIN questions ON users.userid=questions.userid WHERE swimming='1' AND questions.questionnaire_status='1'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                While($row=$result->fetch_assoc()){
                    if($row['agepref']=='20-26'){
                    $swi20to26++;
                    }
                    if($row['agepref']=='27-33'){
                    $swi27to33++;
                    }
                    if($row['agepref']=='34-40'){
                    $swi34to40++;
                    }
                    if($row['agepref']=='40+'){
                    $swi40++;
                    }
                }
            }
            header("Location: /gym-form/MeCompareOthers.php?1-3times=$One2Three&4-7times=$Four2Seven&8-11times=$Eight2Eleven&11plus=$Elevenplus&bic20to26=$bic20to26&bic27to33=$bic27to33&bic34to40=$bic34to40&bic40plus=$bic40plus&gym20to26=$gym20to26&gym27to33=$gym27to33&gym34to40=$gym34to40&gym40=$gym40&arts20to26=$arts20to26&arts27to33=$arts27to33&arts34to40=$arts34to40&arts40=$arts40&game20to26=$game20to26&game27to33=$game27to33&game34to40=$game34to40&game40=$game40&run20to26=$run20to26&run27to33=$run27to33&run34to40=$run34to40&run40=$run40&swi20to26=$swi20to26&swi27to33=$swi27to33&swi34to40=$swi34to40&swi40=$swi40");
        }
        
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

