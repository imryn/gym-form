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
                 
            if(!empty($_POST['kindergartenid']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) &&
            !empty($_POST['parentId']) && !empty($_POST['password']) && !empty($_POST['email']) && 
            !empty($_POST['mobilephone']) && !empty($_POST['familyMember']) && !empty($_POST['anothercontact']) &&
            !empty($_POST['relationship']) && !empty($_POST['mobilephone2']) ){

              

                $values = "'{$_POST['kindergartenid']}','{$_POST['firstname']}','{$_POST['lastname']}',{$_POST['parentId']},'{$_POST['password']}',
                '{$_POST['addressuser']}','{$_POST['city']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['mobilephone']}','{$_POST['familyMember']}',
                '{$_POST['anothercontact']}','{$_POST['relationship']}','{$_POST['mobilephone2']}'";

                $sql = "INSERT INTO users (kindergartenid,firstname,lastname,parentId,password,
                addressuser,city,email,phone,mobilephone,familyMember,anothercontact,relationship,mobilephone2) VALUES ($values)";
            
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
                    header("Location: /tihnot_zad_sharat/gym form/index.php"); 
                }
                else{
                    header("Location: /tihnot_zad_sharat/gym form/login_page.php");
                }
            }
            else{
                header("Location: /tihnot_zad_sharat/gym form/Sadna/login_page.php");
            }
        } 
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

