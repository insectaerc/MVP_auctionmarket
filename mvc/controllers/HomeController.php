<?php
    class HomeController extends BaseController{
        private $productModel;
        function __construct(){
            //Create ProductModel
            self::loadModel('mvc/models/ProductModel.php');
            $this->productModel = new ProductModel;
        }
        
        function index(){
            $endSoon = $this->productModel->findClassifiedProduct(4, 'closingTime', 1);
            $highBid = $this->productModel->findClassifiedProduct(4, 'highestBid', -1);
            $mostBidded = $this->productModel->findClassifiedProduct(4, 'bidNum', -1);
            parent::view('mvc/views/frontend/homes/index.php', ['endSoonProducts'=>$endSoon, 'highBidProducts'=>$highBid, 'mostBiddedProducts'=>$mostBidded]);
        }

        function logout(){
            // remove all session variables
            session_unset();
            // destroy the session
            session_destroy();
            self::index();
        }
    }
?>