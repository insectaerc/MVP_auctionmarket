<?php
    class ProductController extends BaseController{
        private $productModel;
        function __construct(){
            //Create ProductModel
            self::loadModel('mvc\models\ProductModel.php');
            $this->productModel = new ProductModel;
        }

        function index(){
            $data = $this->productModel -> getAll();
            parent::view('mvc\views\frontend\products\index.php', $data);
        }
        function show(){
            $data = $this->productModel -> findProduct('Puffy Dorito');
            parent::view('mvc\views\frontend\products\show.php', $data);
        }
    }
?>