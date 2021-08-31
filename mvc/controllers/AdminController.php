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
        if(isset($_SESSION['email'])){
            $data = $this->adminModel->getAdmins();
           
            $model = $this->adminModel;
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
        // remove all session variables
        session_start();
        // destroy the session
        unset($_SESSION['email']);
        header('Location: index.php');
    }
  
    function info(){
        
        self::loadModel('mvc/models/CustomerModel.php');
        $this->customerModel = new CustomerModel;
    
        $data = $this->customerModel->getCustomers();
       
        $model = $this->customerModel;
        
        parent::view('mvc/views/frontend/admin/info.php', $data);
        
    }

    function trans(){
    
        self::loadModel('mvc/models/TransactionModel.php');
      
        $this->transactionModel = new TransactionModel;
       
        $data = $this->transactionModel->getTransactions();
    
        $model = $this->transactionModel;
        
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
    }

        
    
   
    
   
   
}