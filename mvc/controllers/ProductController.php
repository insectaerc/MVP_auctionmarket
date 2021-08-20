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
        function detail($id){
            $data = $this->productModel -> findProduct($id);
            parent::view('mvc\views\frontend\products\detail.php', $data);
        }
        function show($classifyType){
            switch ($classifyType) {
                case 'endsoon':
                    $data = $this->productModel -> findClassifiedProduct(12, 'closingTime', 1);
                    $title = 'End Soon';
                    break;
                case 'highbid':
                    $data = $this->productModel->findClassifiedProduct(12, 'maxBid', -1);
                    $title = 'High Bid';
                    break;
                case 'mostbidded':
                    $data = $this->productModel->findClassifiedProduct(12, 'bidNum', -1);
                    $title = 'Most Bidded';
                    break;
                default:
                    echo "cc";
                    break;
            }
            parent::view('mvc\views\frontend\products\show.php', ['data'=>$data, 'title'=>$title]);
        }

    }   
?>