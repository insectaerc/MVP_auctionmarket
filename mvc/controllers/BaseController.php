<?php
class BaseController{
    public static function view($path){
        include $path;
    }
    public function test(){
        echo "lala";
    }
}
?>