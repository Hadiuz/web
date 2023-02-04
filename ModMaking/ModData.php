<?php

namespace ModMaking;

class ModData
{
    private $blocks;
    private $items;

    public function addBlock($name){
        $this->blocks[$name] = $name;
    }
    public function addItem($name){
        $this->items[$name] = $name;
    }

    public function getBlocks(){
        return $this->blocks;
    }
    public function setBlocks($blocks){
        $this->blocks = $blocks;
    }
    public function getItems(){
        return $this->items;
    }
    public function setItems($items){
        $this->items = $items;
    }
}