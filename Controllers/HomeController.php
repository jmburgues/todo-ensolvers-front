<?php
    namespace Controllers;
    use API\FolderAPI as FolderAPI;
    use API\TaskAPI as TaskAPI;
    use Models\Task as Task;

class HomeController
    {
        private $TaskAPI;
        private $FolderAPI;

        public function __construct(){
            $this->TaskAPI = new TaskAPI();
            $this->FolderAPI = new FolderAPI();
        }
    
        public function Index($message = 1)
        {

            $folders = $this->FolderAPI->getAll();
            require_once(VIEWS_PATH.'home.php');
        }
    }
?>