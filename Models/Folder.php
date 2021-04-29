<?php

namespace Models;
    
class Folder{
    private $id;
    private $name;
    private $tasks;

    public function __construct($id='',$name='',$tasks=''){
        $this->id = $id;
        $this->name = $name;
        $this->tasks = $tasks;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getTasks(){
        return $this->tasks;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setTasks($tasks){
        $this->tasks = $tasks;
    }   
}
?>