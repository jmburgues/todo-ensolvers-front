<?php 
namespace API;

use Models\Folder as Folder;
use Models\Task as Task;
use API\TaskAPI as TaskAPI;

class FolderAPI{

    private $TaskAPI;

    public function __construct(){
        $this->TaskAPI = new TaskAPI();
    }

    public function getAll(){
        $data = file_get_contents(API_URL."/folder");
        $array = ($data) ? json_decode($data, true) : array();
        $folderObject = array();

        foreach($array as $folder){

            $tasksList = $this->TaskAPI->jsonToObject($folder["tasks"]);
            $newFolder = new Folder($folder["id"],$folder["name"],$tasksList);
            array_push($folderObject,$newFolder);
        }

        return $folderObject;
    }

    public function getOne($id){

        $data = file_get_contents(API_URL."/folder/".$id);
        $jsonTask = ($data) ? json_decode($data, true) : array();

        $taskList = $this->TaskAPI->jsonToObject($jsonTask["tasks"]);
        $newFolder = new Folder($jsonTask["id"],$jsonTask["name"],$taskList);

        return $newFolder;
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
          $result = file_get_contents(API_URL."/folder", false, $context );
          $response = json_decode( $result );
        return $response;
    }

    public function appendToFolder($folderId,$idTask){

        $options = array('http' =>
        array(
            'method'  => 'PUT',
            'header'  => 'Content-type: application/x-www-form-urlencoded'
            )
        );
    
          $context  = stream_context_create( $options );
          $result = file_get_contents(API_URL."/folder/".$folderId."/task/".$idTask, false, $context );
          $response = json_decode( $result );
        return $response;
    }

    public function remove($folderId){
        $options = array('http' =>
        array(
            'method'  => 'DELETE',
            'header'  => 'Content-type: application/x-www-form-urlencoded'
            )
        );
    
          $context  = stream_context_create( $options );
          $result = file_get_contents(API_URL."/folder/".$folderId, false, $context );
          $response = json_decode( $result );
        return $response;
    }
}

?>