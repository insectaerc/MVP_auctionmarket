<?php
    class HomeController extends BaseController{
        static function index(){
            parent::view('mvc\views\frontend\homes\index.php');
        }
    }
?>