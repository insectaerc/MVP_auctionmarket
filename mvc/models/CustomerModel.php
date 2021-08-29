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
  //update Customer  
  public function updateCustomer($obj)
  {
  }
  // delete Customer  
  public function deleteCustomer($id)
  {
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
      print("No user name existed");
      return;
    }
    $account = $data;
    if ($account['pass'] == $password) {
      print("login successed!");
      $_SESSION['customer_id'] = $data['customer_id'];

      header("Refresh:0");
    } else {
      print("login failed, wrong password!");
    }
  }
}
