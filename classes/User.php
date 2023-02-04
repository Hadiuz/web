
<?php
class User{
    private $data;    
    


    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function reset(){
        unset($this->data);
    }

    
    
    


   }

    

?>