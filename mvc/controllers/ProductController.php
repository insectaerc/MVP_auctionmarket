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
                    $data = $this->productModel->findClassifiedProduct(12, 'closingTime', 1);
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
        function add(){
            if(isset($_POST['name']) && isset($_POST['minPrice']) && isset($_POST['closingTime'])){
                $name = $_POST['name'];
                $minPrice = $_POST['minPrice'];
                $closingTime = $_POST['closingTime'];
                $ownerID = $_SESSION['customer_id'];
                $this->productModel -> store($name, $minPrice, $closingTime, $ownerID);
            }
        }
        function update($productID){
            $name = $_POST['name'];
            $closingTime = $_POST['closingTime'];
            $minPrice = $_POST['minPrice'];
            $this->productModel -> update($productID, $name, $minPrice, $closingTime);
        }

        function delete($productID){
            $this->productModel -> destroy($productID);
        }
    }   
?>