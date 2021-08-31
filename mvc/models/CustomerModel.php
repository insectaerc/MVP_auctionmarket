<?php
class TableRows extends RecursiveIteratorIterator
{
  function __construct($it)
  {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current()
  {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
  }

  function beginChildren()
  {
    echo "<tr>";
  }

  function endChildren()
  {
    echo "</tr>" . "\n";
  }
}

class CustomerModel extends MySQLDatabase
{
  protected $db;
  // set database config for mysql  
  public function __construct()
  {
    $this->open_db();
  }
  // open mysql data base  
  public function open_db()
  {
    $this->db = parent::connect();
  }
  // close database  
  public function close_db()
  {
    $this->db->close();
  }
  // insert Customer  
  public function addCustomer($obj)
  {
    $count = sizeof($this->getCustomers());
    $newId = $count + 1;

    $stmt = $this->db->prepare("INSERT INTO `customers` (`customer_id`,`first_name`,`last_name`,`gender`,`email`,`city`,`country`,`national_id`,`phone`,`pass`,`balance`,`branch_id`) 
    VALUES (:customer_id,:firstName, :lastName,:gender,:email,:city,:country,:national_id,:phone,:pass,:balance,:branch)");
    $stmt->execute([
      'customer_id' => $newId,
      'firstName' => $obj['first_name'],
      'lastName' => $obj['last_name'],
      'gender' => $obj['gender'],
      'email' => $obj['email'],
      'city' => $obj['city'],
      'country' => $obj['country'],
      'national_id' => $obj['national_id'],
      'phone' => $obj['phone'],
      'pass' => $obj['pass'],
      'balance' => $obj['balance'],
      'branch' => $obj['branch']

    ]);
    //$data = $stmt->fetch();
  }
  //update Customer's Balance
  public function updateBalanceOfCustomer($balance, $customer_id)
  {
    $sqlStatement = "UPDATE customers SET balance = :balance WHERE customer_id = :customer_id";
    $stmt = $this->db->prepare($sqlStatement);
    $stmt->execute(['balance' => $balance, 'customer_id' => $customer_id]);
    return header('Location: ' . $_SERVER['HTTP_REFERER']);;
  
  }
  // delete Customer  
  public function deleteCustomer($customer_id)
  {
    $sqlStatement = "DELETE FROM customers WHERE customer_id = :customer_id";
    $stmt = $this->db->prepare($sqlStatement);
    return header('Location: ' . $_SERVER['HTTP_REFERER']);;
  

  }
  // select Customer       
  public function getCustomers()
  {
    $sqlStatement = "SELECT * FROM customers";
    try {
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $data = [];
      foreach ($this->db->query($sqlStatement) as $row) {
        array_push($data, $row);
        //print $v;
      }
      $data = array_values($data);
      return $data;
    } catch (PDOException $e) {

      $e->getMessage();
    }
  }

  public function getCustomerById($id)
  { 
    $stmt = $this->db->prepare("SELECT * FROM customers WHERE customer_id=:id");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $js_code = 'console.log(' . json_encode($data, JSON_HEX_TAG) .
      ');';
    $js_code = '<script>' . $js_code . '</script>';
    echo $js_code;
    return $data;
  }
  public function getCustomerByPhoneOrEmail($username)
  {
    $stmt = $this->db->prepare("SELECT * FROM customers WHERE email=:id OR phone=:id");
    $stmt->execute(['id' => $username]);
    $data = $stmt->fetch();
    return $data;
  }
  public function check_user($id, $password)
  {
    $data = $this->getCustomerByPhoneOrEmail($id);
    if ($data == null) {
      echo "<div class='alert alert-dismissible alert-warning mt-5'>";
      echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
      echo "<h4 class='alert-heading'>We are sorry!</h4>";
      echo "<p class='mb-0'>No username existed.</p>";
      echo "</div>";
      return;
    }
    $account = $data;
    if ($account['pass'] == $password) {
      $data['customer_id']= (int) $data['customer_id'];
      $_SESSION['customer_id'] = $data['customer_id'];

      header("Refresh:0");
    } else {
      print("login failed, wrong password!");
    }
  }
}
