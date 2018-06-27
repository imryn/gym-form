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
                $error = "The ID that was entered is invalid"; 
            }
            else if(empty($_POST['password'])){
                $error = "No password was entered"; 
            }
            else if(empty($_POST['city'])){
                $error = "No city was entered";
            }
            else if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error = "The email is already used or invalid";
            }
            else if(empty($_POST['phonenumber'])){
                $error = "The phonenumber is invalid";
            }
            else if(empty($_POST['height'])){
                $error = "You can't send the form without sending height";
            }
            else if(empty($_POST['weight'])){
                $error = "You can't send the form without sending weight";
            }
            if(!empty($error)){
                header("Location: /tihnot_zad_sharat/gym-form/index.php?error-message=$error");
            }

            else{

                $values = "'{$_POST['gender']}','{$_POST['agepref']}','{$_POST['firstname']}','{$_POST['lastname']}',{$_POST['userid']},
                '{$_POST['password']}','{$_POST['city']}','{$_POST['email']}','{$_POST['phonenumber']}',{$_POST['height']},{$_POST['weight']}";

                $sql = "INSERT INTO users (gender,agepref,firstname,lastname,userid,
                password,city,email,phonenumber,height,weight) VALUES ($values)";
            
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
                    header("Location: /tihnot_zad_sharat/gym-form/index.php?error-message=The form was saved!");
                    //  echo json_encode((object) [
                    //     'id' => $id,
                    //      'success'=>true
                    // ]);
                }
               
            } 
         
        }

         public function login(){
            if( isSet($_SESSION['token']) && isSet($_POST['token']) && $_SESSION['token'] == $_POST['token']){
                $this->allowSpecialCharacters($_POST);
                $sql = "SELECT userid FROM users WHERE userid='{$_POST['userid']}' AND password ='{$_POST['password']}'";
                $result = $this->db->query($sql);
                if(mysqli_num_rows($result) > 0 ){
                    $_SESSION['login'] = $_POST['token'];
                    $_SESSION['userid'] = $_POST['userid'];
                    header("Location: /tihnot_zad_sharat/gym-form/training-questions.php"); 
                }
                else{
                    header("Location: /tihnot_zad_sharat/gym-form/login_page.php");
                }
            }
            else{
                header("Location: /tihnot_zad_sharat/gym-form/login_page.php");
            }
        }

        public function isLogin() {
            if(!empty( $_SESSION['userid'] )) {
                return true;
            }
            return false;
        }
        
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

