HOME PAGE
<?php
    class Home{
        function __construct(){
            echo "Home - Hello";
        }
        static function show(){
            echo "Home says 1";
        }
        static function home2($param){
            echo "Home says $param";
        }
    }
?>