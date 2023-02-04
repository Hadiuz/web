
<?php
   class User{
    private $data;    
    
    //require_once('Datenbank.php');
    //private $db = new Datenbank();

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function reset(){
        unset($this->data);
    }

    
    
    
    public function op(){    
        $sql = "nutzer";
        $result = $db->mysqlGetEntry($sql);
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $key => $value){
                echo $key." ".$value.", ";
            }
            echo "<br>";
        }
    }

   }

    

?>