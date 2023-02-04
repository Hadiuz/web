<?php
    class Datenbank{
        private $db_host = "localhost";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "myDatabase";

        private $db_handle;

        public function mysqlConnect(){
            if($this->db_handle = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_name)){

            }else{
                echo "Connection failed";
            }
        }
        public function connectUserDB($username){
            if($this->db_handle = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $username)){

            }else {
                echo "Connection failed";
            }
        }

        public function mysqlClose(){
            mysqli_close($this->db_handle);
        }

        public function mysqlEntry($content){

            $this-> mysqlConnect();
            $sql = "INSERT INTO ".$content;
            if(mysqli_query($this->db_handle, $sql)){
                $this->mysqlClose();
            
            }else{
                echo mysqli_errno($this->db_handle).mysqli_error($this->db_handle);
            }
        }
        
        public function mysqlGetEntry($content){
            $this->mysqlConnect();

            $sql = "SELECT * FROM ".$content;

            if($result = mysqli_query($this->db_handle, $sql)){
                echo "hat geklappt<br>";
                $this->mysqlClose();
                return $result;
            }else{
                echo "Hat nicht funktioniert";
            }
        }

        public function mysqlGetUser($logindata){
            $this->mysqlConnect();

            $sql = "SELECT * FROM nutzer WHERE password = '".$logindata['password']."' and username = '".$logindata['username']."'";

            if($result = mysqli_query($this->db_handle, $sql)){
                    $this->mysqlClose();
                    return $result;
                }else{
                    echo "Exsestiert nicht";
                }
            
        }
        public function isUsernameTaken($username){
            $this->mysqlConnect();

            $sql = "SELECT * FROM nutzer WHERE username = '".$username."'";

            if(null == $result = mysqli_query($this->db_handle, $sql)){
                $this->mysqlClose();
                return true;
            }else{
                $this->mysqlClose();
                return false;
            }
            
        }
        public function  newUser($username){
            $this->mysqlConnect();
            $sql = "CREATE TABLE `userdata`.`".$username."` (`modname` VARCHAR(512) NOT NULL , `Items` JSON NULL DEFAULT NULL , `Blocks` JSON NULL DEFAULT NULL ) ENGINE = InnoDB;";

            if($result = mysqli_query($this->db_handle, $sql)){
                $this->mysqlClose();
            }else{
                $this->mysqlClose();
                echo "Fehler beim Anlegen";
            }

        }
    }

?>