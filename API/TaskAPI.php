<?php 
namespace API;

use Models\Task as Task;

class TaskAPI{

    public function getAll(){
        $jsonData = file_get_contents(API_URL."/task");
        $array = ($jsonData) ? json_decode($jsonData, true) : array();

        return $this->jsonToObject($array);
    }

    public function getOne($id){

        $data = file_get_contents(API_URL."/task/".$id);
        $jsonTask = ($data) ? json_decode($data, true) : array();

        $newTask = new Task($jsonTask["id"],$jsonTask["description"],$jsonTask["done"]);

        return $newTask;
    }

    public function jsonToObject($json){              
      $tasksObjects = array();

      if($json){
        foreach($json as $task){
            $newTask = new Task($task["id"],$task["description"],$task["done"]);
            array_push($tasksObjects,$newTask);
        }
      }
      
      return $tasksObjects;
    }

    public function add($data){
      $options = array(
          'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $data ),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );
        
        $context  = stream_context_create( $options );
        $result = file_get_contents(API_URL."/task", false, $context );
        $response = json_decode( $result );
      return $response;
  }
}

?>