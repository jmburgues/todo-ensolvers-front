<?php

namespace Models;
    
class Task{
    private $id;
    private $description;
    private $done;

    public function __construct($id='',$description='',$done=''){
        $this->id = $id;
        $this->description = $description;
        $this->done = $done;
    }

    public function getId(){
        return $this->id;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDone(){
        return $this->done;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setDone($done){
        $this->done = $done;
    }   
}
?>