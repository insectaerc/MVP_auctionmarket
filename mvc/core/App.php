<?php
    class App{
        protected $controller='Home';
        protected $action='show';
        protected $param=[];

        function __construct(){
            $arr = $this->urlProcess();
            //print_r($arr);
            
            //Url's Controller processing
            if(isset($arr[0]) && file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/".$this->controller.".php";
            if(isset($arr[1])){
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            //Url's Params processing
            //For special situation when user inputs params in the url
            $this->params = $arr?array_values($arr):[];

            call_user_func_array([$this->controller, $this->action], $this->params);   
        }

        function urlProcess(){
            if(isset($_GET["url"])){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>