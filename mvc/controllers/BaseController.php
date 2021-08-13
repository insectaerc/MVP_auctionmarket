<?php
class BaseController{
    public static function view($path, array $data=[]){
        foreach($data as $key => $value){
            $$key = $value;
        }
        include $path;
    }
    protected static function loadModel($path){
        require $path;
    }
}
?>