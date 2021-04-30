<?php 
namespace Controllers;

use Models\Folder as Folder;
use Models\Task as Task;
use API\TaskAPI as TaskAPI;
use API\FolderAPI as FolderAPI;

class TaskController{

    private $TaskAPI;
    private $FolderAPI;

    public function __construct(){
        $this->TaskAPI = new TaskAPI();
        $this->FolderAPI = new FolderAPI();
    }

    public function add($idFolder,$description){
        $array = array();
        $array["description"] = $description;

        $response = $this->TaskAPI->add($array);
        $response = json_decode(json_encode($response), true);

        $idTask = str_replace(API_URL."/task/", "", $response["url"]); // get task id by substracting url from response
       
        $this->FolderAPI->appendToFolder($idFolder,$idTask);

        $folder = $this->FolderAPI->getOne($idFolder);
        $tasks = $folder->getTasks();
        require_once(VIEWS_PATH."folder.php");
    }

    public function view($id){
        $folder = $this->FolderAPI->getOne($id);
        $tasks = $folder->getTasks();
        require_once(VIEWS_PATH."folder.php");
    }

    public function changeStatus($id,$folderId){
        $task = $this->TaskAPI->getOne($id);
        $task->setDone(
                ($task->getDone() ? false : true)
            );
        
        $data = array();
        $data["id"] = $task->getId();
        $data["description"] = $task->getDescription();
        $data["done"] = $task->getDone();
  
        $this->TaskAPI->update($data);

        $folder = $this->FolderAPI->getOne($folderId);
        $tasks = $folder->getTasks();
        require_once(VIEWS_PATH."folder.php");    
    }
    
    public function edit($id,$folderId){
        $task = $this->TaskAPI->getOne($id);
        require_once(VIEWS_PATH."editTask.php");   
    }

    public function sendEdit($id, $done, $folderId,$description){

        $data = array();
        $data["id"] = $id;
        $data["description"] = $description;
        $data["done"] = (isset($done)) ? $done : 0;

        $this->TaskAPI->update($data);

        $folder = $this->FolderAPI->getOne($folderId);
        $tasks = $folder->getTasks();
        require_once(VIEWS_PATH."folder.php");
    }

    public function remove($id,$folderId){
        $this->TaskAPI->remove($id);

        $folder = $this->FolderAPI->getOne($folderId);
        $tasks = $folder->getTasks();
        require_once(VIEWS_PATH."folder.php");
    }
}
?>