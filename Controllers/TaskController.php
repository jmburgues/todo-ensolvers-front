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

    public function remove($id){

    }
}
?>