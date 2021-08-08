Product Page
<?php
    class Product{
        function __construct(){
            echo "Product - Hello";
        }
        static function show(){
            echo "product says 1";
        }
        static function product2($firstparam){
            echo "product says $firstparam";
        }
    }
?>