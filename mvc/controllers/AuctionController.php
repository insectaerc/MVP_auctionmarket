<?php
    class Auction extends BaseController{
        static function index(){
            parent::view('mvc\views\frontend\auctions\index.php');
        }
        function product2($firstparam){
            echo "product says $firstparam";
        }
    }
?>