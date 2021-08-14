<?php
    require 'vendor\autoload.php';
    require 'mvc\controllers\BaseController.php';
    require 'mvc\core\database\mongodb.php';
    require 'mvc\views\frontend\bootstrap.html';
    class App{
        protected $controller='Home';
        protected $action='index';
        //protected $param=[];

        function __construct(){
            $arr = $this->urlProcess();
            
            //Get name of the url's controller and attach it to $this->controller
            if(isset($arr[0]) && file_exists("./mvc/controllers/".$arr[0]."Controller.php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/".$this->controller."Controller.php";
            $this->controller = ucfirst($this->controller.'Controller');
            
            //Get name of the url's action and attach it to $this->action
            if(isset($arr[1])){
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            //Url's Params processing
            //For special situation when user inputs params in the url
            $this->params = $arr?array_values($arr):[];
            
            //Create object for specific controller and use the object to call specific action
            $controllerObject = new $this->controller;
            $action = $this->action;
            if(isset($arr[2])){
                $controllerObject->$action($arr[2]);
            }else{
                $controllerObject->$action();
            }
            
            

            //Ignore below line
            //call_user_func_array([$this->controller, $this->action], $this->params);
        }
        
        //Changing form of url to an array
        //Ex: home/product/2 -> Array ([0] => home [1] => product [2] => 2)
        function urlProcess(){
            if(isset($_GET["url"])){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>