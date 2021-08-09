<?php
    class Product extends BaseController{
        static function index(){
            parent::view('mvc\views\frontend\products\index.php');
        }
        function product2($firstparam){
            echo "product says $firstparam";
        }
    }
?>