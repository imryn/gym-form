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

            $values = "'{$_SESSION['userid']}','{$_POST['bicycle']}','{$_POST['goingtogym']}','{$_POST['martialarts']}','{$_POST['game']}','{$_POST['running']}',
            '{$_POST['swimming']}','{$_POST['unoraerobic_exercises']}','{$_POST['gymsport']}','{$_POST['training_frequency']}',
            '{$_POST['training_favorite_time']}','{$_POST['balance']}','{$_POST['cardio']}','{$_POST['shaping_and_toning']}','{$_POST['weight_loss']}','{$_POST['goal']}',
            '{$_POST['trainning_manner']}','{$_POST['trainning_cost']}','{$_POST['food']}','{$_POST['trainning_satisfied']}'";

            $sql = "INSERT INTO questions (userid,bicycle,goingtogym,martialarts,game,running,swimming,unoraerobic_exercises,
            gymsport,training_frequency,training_favorite_time,balance,cardio,
            shaping_and_toning,weight_loss,goal,trainning_manner,trainning_cost,food,trainning_satisfied) VALUES ($values)";
        
            $result =$this->db->query($sql);
            if($result){
                $id = $this->db->insert_id;
                header("Location: /gym-form/training-questions.php?error-message=The form was saved!");
            }
        }

        public function finalForm(){
            $sql = "select * from questions where userid ='".$_SESSION['userid'] ."'";
            $result =$this->db->query($sql);
            if($result -> num_rows >0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/disabled-training-questions.php?bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}");
            }
        }

    }