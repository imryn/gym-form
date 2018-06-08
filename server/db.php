<?php  

   class DB {

        private static $instance = null;
        private $connect;
    
        private function __construct(){
          $this->connect = new mysqli('us-cdbr-gcp-east-01.cleardb.net','b54a0834df827f', 'ba006edc', 'gcp_ac134926fbc5dc52c106');
        }
        
        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new DB();
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->connect;
        }
  } 

?>