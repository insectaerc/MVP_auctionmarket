<?php
class BaseController{
    public static function view($path, array $data=[]){
        include $path;
    }
    protected static function loadModel($path){
        require $path;
    }
}
?>