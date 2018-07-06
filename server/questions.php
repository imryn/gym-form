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

            $error = "";
            if(empty($_POST['gymsport']) && empty($_POST['bicycle']) && empty($_POST['martialarts']) &&
            empty($_POST['game']) && empty($_POST['running']) && empty($_POST['swimming'])){
                $error = "no answer";
            }
            else if(empty($_POST['unoraerobic_exercises'])){
                $error = "no answer";
            }
            else if (empty($_POST['training_frequency'])){
                $error = "no answer"; 
            }
            else if(empty($_POST['training_favorite_time'])){
                $error = "no answer"; 
            }
            else if(empty($_POST['balance']) && empty($_POST['cardio']) && empty($_POST['shaping_and_toning']) &&
            empty($_POST['weight_loss']) && empty($_POST['goal'])){
                $error = "no answer"; 
            }
            else if(empty($_POST['trainning_manner'])){
                $error = "no answer"; 
            }
            else if(empty($_POST['trainning_cost'])){
                $error = "no answer";
            }
            else if(empty($_POST['food'])){
                $error = "no answer";
            }
            else if(empty($_POST['trainning_satisfied'])){
                $error = "no answer";
            }
      
            if(!empty($error)){
                $this->updateQuestionsFormForUser();;
            }

            else{
                $sql = "UPDATE questions SET gymsport='{$_POST['gymsport']}',bicycle='{$_POST['bicycle']}', martialarts='{$_POST['martialarts']}',
                game='{$_POST['game']}', running='{$_POST['running']}', swimming='{$_POST['swimming']}',unoraerobic_exercises='{$_POST['unoraerobic_exercises']}',training_frequency='{$_POST['training_frequency']}',
                training_favorite_time='{$_POST['training_favorite_time']}',balance='{$_POST['balance']}',cardio='{$_POST['cardio']}',shaping_and_toning='{$_POST['shaping_and_toning']}',
                weight_loss='{$_POST['weight_loss']}',goal='{$_POST['goal']}', trainning_manner='{$_POST['trainning_manner']}',trainning_cost='{$_POST['trainning_cost']}',
                food='{$_POST['food']}',trainning_satisfied='{$_POST['trainning_satisfied']}', questionnaire_status='1'
                WHERE questions.userid='{$_SESSION['userid']}'";
    
                $_SESSION['questionnaire_status'] ='1';
    
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
                    $this->finalForm();
                    // header("Location: /gym-form/training-questions.php?error-message=The form was saved!");
                }
            }

            // $values = "'{$_POST['gymsport']}','{$_POST['bicycle']}','{$_POST['martialarts']}','{$_POST['game']}','{$_POST['running']}',
            // '{$_POST['swimming']}','{$_POST['unoraerobic_exercises']}','{$_POST['training_frequency']}',
            // '{$_POST['training_favorite_time']}','{$_POST['balance']}','{$_POST['cardio']}','{$_POST['shaping_and_toning']}','{$_POST['weight_loss']}','{$_POST['goal']}',
            // '{$_POST['trainning_manner']}','{$_POST['trainning_cost']}','{$_POST['food']}','{$_POST['trainning_satisfied']}'";

            // $sql = "INSERT INTO questions (gymsport,bicycle,martialarts,game,running,swimming,unoraerobic_exercises,
            // training_frequency,training_favorite_time,balance,cardio,
            // shaping_and_toning,weight_loss,goal,trainning_manner,trainning_cost,food,trainning_satisfied) VALUES ($values) WHERE questions.userid='{$_SESSION['userid']}'";
        
     
        }

        public function updateQuestionsFormForUser(){
            $this->allowSpecialCharacters($_POST);

            $sql = "UPDATE questions SET gymsport='{$_POST['gymsport']}',bicycle='{$_POST['bicycle']}',martialarts='{$_POST['martialarts']}',
            game='{$_POST['game']}',running='{$_POST['running']}',swimming='{$_POST['swimming']}',unoraerobic_exercises='{$_POST['unoraerobic_exercises']}',
            training_frequency='{$_POST['training_frequency']}',training_favorite_time='{$_POST['training_favorite_time']}',
            balance='{$_POST['balance']}',cardio='{$_POST['cardio']}',shaping_and_toning='{$_POST['shaping_and_toning']}',
            weight_loss='{$_POST['weight_loss']}',goal='{$_POST['goal']}',trainning_manner='{$_POST['trainning_manner']}',
            trainning_cost='{$_POST['trainning_cost']}',food='{$_POST['food']}',trainning_satisfied='{$_POST['trainning_satisfied']}'
            WHERE questions.userid='{$_SESSION['userid']}'";

            $result =$this->db->query($sql);
            if($result){
                $id = $this->db->insert_id;
                $this->sendtoNotFullform();
            }
        }

        public function sendtoNotFullform() {
            $sql = "SELECT * FROM questions WHERE userid ='{$_SESSION['userid']}'";
            $result =$this->db->query($sql);
            if(mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                header("Location: /gym-form/not-full-training-questions.php?bicycle={$row['bicycle']}&gymsport={$row['gymsport']}&martialarts={$row['martialarts']}&game={$row['game']}&running={$row['running']}&swimming={$row['swimming']}&training_frequency={$row['training_frequency']}&training_favorite_time={$row['training_favorite_time']}&balance={$row['balance']}&cardio={$row['cardio']}&shaping_and_toning={$row['shaping_and_toning']}&weight_loss={$row['weight_loss']}&goal={$row['goal']}&trainning_manner={$row['trainning_manner']}&trainning_cost={$row['trainning_cost']}&food={$row['food']}&trainning_satisfied={$row['trainning_satisfied']}&unoraerobic_exercises={$row['unoraerobic_exercises']}&error-message=The form was saved!");
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

    }