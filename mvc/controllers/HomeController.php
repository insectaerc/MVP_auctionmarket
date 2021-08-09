<?php
    class Home extends BaseController{
        static function index(){
            parent::view('mvc\views\frontend\homes\index.php');
        }
        function product2($firstparam){
            echo "product says $firstparam";
        }
    }
?>