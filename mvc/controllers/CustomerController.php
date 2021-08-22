<?php
class CustomerController extends BaseController
{
    public static $instance;
    private $customerModel;
    public function __construct()
    {
        //Create customerModel
        self::$instance = $this;
        self::loadModel('mvc/models/CustomerModel.php');
        $this->customerModel = new CustomerModel;
    }
    function index()
    {
        if(isset($_SESSION['id'])){
            $data = $this->customerModel->getCustomers();
            $model = $this->customerModel;
            parent::view('mvc/views/frontend/customers/index.php', $data);
        }else{
            parent::view('mvc/views/frontend/customers/login.php');
        }
    }
    
    function detail($id)
    {
        $data = $this->customerModel->getCustomerById($id);
        parent::view('mvc/views/frontend/customers/detail.php', $data);
    }
    
    function check_user()
    {
        // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
        if (isset($_POST["btn_submit"])) {
            // lấy thông tin người dùng
            $username = $_POST["username"];
            $password = $_POST["password"];
            //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
            //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
            $username = strip_tags($username);
            $username = addslashes($username);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($username == "" || $password == "") {
                echo "username or password cannot be blank!";
            } else {
                if ($this->customerModel == null) 
                {
                    $this->customerModel = new CustomerModel;                
                   
                }
                $this->customerModel->check_user($username, $password);
            }
        }
    }
    function add_user()
    {
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["psw"];
        $repeatpassword = $_POST["psw-repeat"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $nationalId= $_POST["nationalId"];
        $branch = $_POST["branch"];
        $gender = $_POST["gender"];
        $balance = 0;

        $user = array (
            "email"=>$email,
            "phone"=>$phone,
            "pass" => $password,
            "first_name"=>$firstName,
            "last_name"=>$lastName,
            "city"=>$city,
            "country"=>$country,
            "national_id"=>$nationalId,
            "branch_id"=>$branch,
            "gender"=>$gender,
            "balance"=>$balance,
            "branch"=>$branch
        );
        $this -> customerModel->addCustomer($user);

    }
}
