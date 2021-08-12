<?php
    class CustomerController extends BaseController{
        static function index(){
            parent::view('mvc\views\frontend\customers\index.php');
        }
        function product2($firstparam){
            echo "product says $firstparam";
        }
    }
?>