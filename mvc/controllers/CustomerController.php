<?php
class CustomerController extends BaseController
{
    private $customertModel;
    public function __construct()
    {
        //Create customerModel
        self::loadModel('mvc\models\CustomerModel.php');
        $this->customerModel = new CustomerModel;
    }
    function index()
    {
        $data = $this->customerModel->getCustomers();
        $model = $this->customertModel;
        parent::view('mvc\views\frontend\customers\index.php', $data);
    }
    function detail($id)
    {
        $data = $this->customerModel->getCustomerById($id);
        parent::view('mvc\views\frontend\customers\detail.php', $data);
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
                $this -> customertModel->check_user($username,$password);
            }
        }        
    }
}
