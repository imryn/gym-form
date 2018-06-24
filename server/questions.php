<?php

    require_once('db.php');

    class Questions{

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


        public function createQuestionsFormForUser(){
            $this->allowSpecialCharacters($_POST);

            $values = "'{$_POST['bicycle']}','{$_POST['goingtogym']}','{$_POST['martialarts']}','{$_POST['game']}','{$_POST['running']}',
            '{$_POST['swimming']}','{$_POST['unoraerobic_exercises']}','{$_POST['gymsport']}','{$_POST['training_frequency']}',
            '{$_POST['training_favorite_time']}','{$_POST['balance']}','{$_POST['cardio']}','{$_POST['shaping_and_toning']}','{$_POST['weight_loss']}','{$_POST['goal']}',
            '{$_POST['trainning_manner']}','{$_POST['trainning_cost']}'";

            $sql = "INSERT INTO questions (bicycle,goingtogym,martialarts,game,running,swimming,unoraerobic_exercises,
            gymsport,training_frequency,training_favorite_time,balance,cardio,
            shaping_and_toning,weight_loss,goal,trainning_manner,trainning_cost) VALUES ($values)";
        
            $result =$this->db->query($sql);
            if($result){
                $id = $this->db->insert_id;
                header("Location: /tihnot_zad_sharat/gym-form/training-questions.php?error-message=The form was saved!");
            }
        }

    }