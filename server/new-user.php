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
                 
            if(!empty($_POST['gender']) && !empty($_POST['agepref']) && !empty($_POST['firstname']) &&
            !empty($_POST['lastname']) && !empty($_POST['userid']) && !empty($_POST['password']) && 
            !empty($_POST['city']) && !empty($_POST['email']) && !empty($_POST['phonenumber']) &&
            !empty($_POST['height']) && !empty($_POST['weight']) ){

              

                $values = "'{$_POST['gender']}','{$_POST['agepref']}','{$_POST['firstname']}','{$_POST['lastname']}',{$_POST['userid']},
                '{$_POST['password']}','{$_POST['city']}','{$_POST['email']}','{$_POST['phonenumber']}',{$_POST['height']},{$_POST['weight']}";

                $sql = "INSERT INTO users (gender,agepref,firstname,lastname,userid,
                password,city,email,phonenumber,height,weight) VALUES ($values)";
            
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
                     echo json_encode((object) [
                        'id' => $id,
                         'success'=>true
                    ]);
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
                    header("Location: /tihnot_zad_sharat/gym-form/index.php"); 
                }
                else{
                    header("Location: /tihnot_zad_sharat/gym-form/login_page.php");
                }
            }
            else{
                header("Location: /tihnot_zad_sharat/gym-form/login_page.php");
            }
        } 
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

