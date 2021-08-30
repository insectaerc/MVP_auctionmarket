<?php
    class ProductController extends BaseController{
        private $productModel;
        function __construct(){
            //Create ProductModel
            self::loadModel('mvc/models/ProductModel.php');
            $this->productModel = new ProductModel;
        }

        function index(){
            $data = $this->productModel -> getAll();
            parent::view('mvc/views/frontend/products/index.php', $data);
        }
        function detail($id){
            //fetch Product Information (name, minBid, closingTime)
            $data = $this->productModel -> findProduct($id);
            $product=$data[0];
            $minBid = (double)$product['minBid'];

            //fetch current highestBid
            self::loadModel('mvc\models\TransactionModel.php');
            $transactionModel = new TransactionModel;
            $highestBidArr = $transactionModel->getHighestBid($id);
            $highestBid = array_values($highestBidArr);
            $highestBid = (double)$highestBid[0];
            if ($highestBid < $minBid){
                $highestBid = $minBid;
            }

            //Push data to detail page
            parent::view('mvc/views/frontend/products/detail.php', ['data'=>$data, 'highestBid'=>$highestBid]);
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
            parent::view('mvc/views/frontend/products/show.php', ['data'=>$data, 'title'=>$title]);
        }
        function add(){
            if(isset($_POST['name']) && isset($_POST['minBid']) && isset($_POST['closingTime'])){
                $name = $_POST['name'];
                $minBid = $_POST['minBid'];
                $closingTime = $_POST['closingTime'];
                $ownerID = $_SESSION['customer_id'];
                $this->productModel -> store($name, $minBid, $closingTime, $ownerID);
            }
        }
        function update($productID){
            $name = $_POST['name'];
            $closingTime = $_POST['closingTime'];
            $minBid = $_POST['minBid'];
            $this->productModel -> update($productID, $name, $minBid, $closingTime);
        }

        function delete($productID){
            $this->productModel -> destroy($productID);
        }

        function bid($productID){
            if(isset($_POST['amount'])){
                self::loadModel('mvc\models\CustomerModel.php');
                $customerModel = new CustomerModel;
                $bidder = $customerModel->getCustomerById($_SESSION['customer_id']);

                $bidder['balance'] = (double)$bidder['balance'];
                $_POST['amount'] = (double)$_POST['amount'];
                
                if($bidder['balance'] < $_POST['amount']){
                    $_SESSION['message'] = "Your account's balance is too low for this bid.";
                }else {
                    $productModel = new ProductModel;
                    $result = $productModel->findProduct($productID);
                    $product = $result[0];
                    if($_POST['amount'] < $product['minBid']){
                        $_SESSION['message'] = "Your bid must be higher than the minimum bid and the current highest bid.";
                    }else{
                        //gọi TransactionModel
                        //gọi getHighestBid($productID)
                        self::loadModel('mvc\models\TransactionModel.php');
                        $model = new TransactionModel;
                        $result = $model->getHighestBid($productID);
                        //so sanh $_POST['amount'] voi ket qua query o tren
                        $value = array_values($result);
                        $currentHighestBid = (double)$value[0];
                        if($_POST['amount'] > $currentHighestBid){

                            //Create Transaction
                            $model->createTransaction($productID, $product['ownerID'], $_SESSION['customer_id'], $_POST['amount']);
                            
                            //Update balance of both bidder and owner
                            $bidder['balance'] = $bidder['balance'] - $_POST['amount'];
                            $customerModel->updateBalanceOfCustomer($bidder['balance'], $bidder['customer_id']);
                            
                            $owner = $customerModel->getCustomerById($product['ownerID']);
                            $owner['balance'] = $owner['balance'] + $_POST['amount'];
                            $customerModel->updateBalanceOfCustomer($owner['balance'], $owner['customer_id']);
                            
                            //Update product's bidNum + highestBid
                            $product['bidNum'] = $product['bidNum'] + 1;
                            $_POST['amount'] = (double)$_POST['amount'];
                            $this->productModel->updateBidding($productID, $product['bidNum'], $_POST['amount']);
                        }else{
                            $_SESSION['message'] = "Your bid must be higher than the current highest bid.";
                        }
                    }
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }   
?>