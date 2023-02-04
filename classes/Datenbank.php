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

            $sql = "SELECT * FROM nutzer WHERE password = username = '".$username."'";

            if($result = mysqli_query($this->db_handle, $sql)){
                    
                    return false;
                }else{
                    return true;
                }
            
        }
    }

?>