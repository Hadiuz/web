<?php

class Mod{
    private $modData;
    private $user;
    public function __constructor($user){
        require_once "ModData.php";
        $modData = new ModData();
        $this->user = $user;
    }


}