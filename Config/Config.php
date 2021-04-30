<?php namespace Config;

/* PATH CONSTANTS */

define("ROOT", dirname(__DIR__) . "/"); 
define("FRONT_ROOT", "/");
define("VIEWS_PATH", ROOT."Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define('CONFIG',ROOT.'Config');
define('IMG_PATH', FRONT_ROOT . "Views/img/");

/* API PATH */
define('API_URL',"https://todo-ensolvers.herokuapp.com");

?>

