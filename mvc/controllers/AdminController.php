<?php

class AdminController extends BaseController{
    public static $instance;
    private $adminModel;
    public function __construct()
    {
        //Create Admin Model
        self::$instance = $this;
        self::loadModel('mvc/models/AdminModel.php');
        $this->adminModel = new AdminModel;
        
    }
    function index()
    {
        if(isset($_SESSION['adminEmail'])){
            $data = $this->adminModel->getAdmins();
            parent::view('mvc/views/frontend/admin/index.php',$data);
        }else{
            parent::view('mvc/views/frontend/admin/adminlogin.php');
        }
        
    }
   
    function check_admin()
    {
        // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
        if (isset($_POST["adminlogin"])) {
            // lấy thông tin người dùng
            $email = $_POST["email"];
            $password = $_POST["password"];
            //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
            //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
            $email = strip_tags($email);
            $email = addslashes($email);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($email == "" || $password == "") {
                echo "username or password cannot be blank!";
            } else {
                if ($this->adminModel == null) 
                {
                    $this->adminModel = new AdminModel;                
                   
                }
                $this->adminModel->check_admin($email, $password);
            }
        }
    }

    function logout(){
        // unset the session
        unset($_SESSION['adminEmail']);
        header('Location: index.php');
    }
  
    function info(){
        
        self::loadModel('mvc/models/CustomerModel.php');
        $this->customerModel = new CustomerModel;
    
        $data = $this->customerModel->getCustomers();
       
        $model = $this->customerModel;
        
        parent::view('mvc/views/frontend/admin/info.php', $data);
        
    }

    // function trans(){
    
    //     self::loadModel('mvc/models/TransactionModel.php');
      
    //     $this->transactionModel = new TransactionModel;
       
    //     $data = $this->transactionModel->getTransactions();
    
    //     $model = $this->transactionModel;
        
    //     parent::view('mvc/views/frontend/admin/trans.php', $data);
        
    // }

    function trans(){
        self::loadModel('mvc/models/TransactionModel.php');
        $this->transactionModel = new TransactionModel;
        if(isset($_POST['product_id'])){
            $product_id = $_POST['product_id'];
            // echo-ing product_id to test POST method
            $data=$this->transactionModel->getTrans_byproductid($product_id);
           // parent::view('mvc/views/frontend/admin/trans.php', $data);

        }else{
            $data = $this->transactionModel->getTransactions();
            $model = $this->transactionModel;
        }
        parent::view('mvc/views/frontend/admin/trans.php', $data);

    }

    
    function edit(){
        
        self::loadModel('mvc/models/CustomerModel.php');
        $this->customerModel = new CustomerModel;

        $customer_id = $_POST['customer_id'];
        $balance = $_POST['balance'];
        
        $this->customerModel->updateBalanceOfCustomer($balance, $customer_id);
       
    }
    function delete($customer_id){
        self::loadModel('mvc/models/CustomerModel.php');
        $this->customerModel = new CustomerModel;
        $this->customerModel -> delete($customer_id);
        $this->session-> set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "mvc/views/frontend/info");
    }


    // function search(){


    //     if(isset($_POST['product_id'])){
       
    //     self::loadModel('mvc/models/TransactionModel.php');
    //     $this->transactionModel = new TransactionModel;

    //     $product_id = $_POST['product_id'];
    //     // echo-ing product_id to test POST method
    //     echo $product_id;
    // }
    //     $data=$this->transactionModel->getTransbyproductid($product_id);
   
    //     parent::view('mvc/views/frontend/admin/search.php', $data);
   
    // }
    
    function searchtime(){
        self::loadModel('mvc/models/TransactionModel.php');
        $this->transactionModel = new TransactionModel;
        if(isset($_POST['save'])){
            $d1 = $_POST['d1'];
            $d2 = $_POST['d2'];
            $product_id = $_POST['product_id'];
        // echo-ing product_id to test POST method
        
        // echo $d1;
        // echo $d2;
        // echo $product_id;
        }
        $data=$this->transactionModel->search_trans_by_time($product_id, $d1, $d2);
        
         parent::view('mvc/views/frontend/admin/trans.php', $data);




    }
    
   
    
   
   
}