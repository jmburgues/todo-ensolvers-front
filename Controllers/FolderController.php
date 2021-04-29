<?php 
namespace Controllers;

use Models\Folder as Folder;
use Models\Task as Task;
use API\TaskAPI as TaskAPI;
use API\FolderAPI as FolderAPI;

class FolderController{

    private $TaskAPI;
    private $FolderAPI;

    public function __construct(){
        $this->TaskAPI = new TaskAPI();
        $this->FolderAPI = new FolderAPI();
    }

    public function add($name){
        $array = array();
        $array["name"] = $name;
        $this->FolderAPI->add($array);

        $folders = $this->FolderAPI->getAll();
        require_once(VIEWS_PATH."home.php");
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