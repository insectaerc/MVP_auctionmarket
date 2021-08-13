<?php
    class HomeController extends BaseController{
        private $productModel;
        function __construct(){
            //Create ProductModel
            self::loadModel('mvc\models\ProductModel.php');
            $this->productModel = new ProductModel;
        }
        function index(){
            $endSoon = $this->productModel->findEndSoonProduct();
            $highBid = $this->productModel->findHighBidProduct();
            $mostBidded = $this->productModel->findMostBiddedProduct();
            parent::view('mvc\views\frontend\homes\index.php', ['endSoonProducts'=>$endSoon, 'highBidProducts'=>$highBid, 'mostBiddedProducts'=>$mostBidded]);
        }
    }
?>