<?php

define("ROOT_PROJECT", __DIR__);

class Autoload{
    /**
    * @var
    */
    private $_method = "index";

    /**
    * @var
    */
    private $_params = [];

    function autoload(){
        spl_autoload_register(function($className) {

            $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
            $fileName = ROOT_PROJECT . "/" . $className . ".php";
            if(file_exists($fileName))
                require_once $className . '.php';
            else
                require_once ROOT_PROJECT . '/App/Controllers/Error404.php';
        
        });
    }
    function run(){
        if(isset($_GET['url'])){
            $name = ucfirst($this->getClass());
            $class = "App\Controllers\\$name";
            if(class_exists($class)){
                $app = new $class;
            }else{
                $app = new App\Controllers\Error404; 
            }
        }else{
            $app = new App\Controllers\Home;
        }

        $temp = explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        if(is_array($temp) && isset($temp[2]) && method_exists($app, $temp[2])){
            $this->_method = $temp[2]; 
        }

        call_user_func_array([$app, $this->_method], []);
    }

    function getClass(){
        $temp = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        return empty($temp[0])?$temp[1]:$temp[0];
    }
}