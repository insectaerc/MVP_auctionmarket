<?php  
      class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
      
        function current() {
          return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }
      
        function beginChildren() {
          echo "<tr>";
        }
      
        function endChildren() {
          echo "</tr>" . "\n";
        }
      } 

class CustomerModel extends MySQLDatabase
{  
    protected $db;
    // set database config for mysql  
    public function __construct()  
    {  
        $this -> open_db();                           
    }  
    // open mysql data base  
    public function open_db()  
    {  
        $this->db= parent::connect();
    }  
    // close database  
    public function close_db()  
    {  
        $this->db->close();  
    }  
    // insert Customer  
    public function addCustomer($obj){ }  
        //update Customer  
    public function updateCustomer($obj){ }  
         // delete Customer  
    public function deleteCustomer($id){ }     
         // select Customer       
    public function getCustomers(){
        $stmt = $this->db->prepare("SELECT * FROM customers");
        $stmt->execute();
         // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = [];
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            array_push($data, $v);
            //echo $v;
        }
        return $data;
     }

     public function getCustomerById($id){
      $stmt = $this->db->prepare("SELECT * FROM customers WHERE email = $id OR phone =$id");
      $stmt->execute();
       // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $data = [];
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          array_push($data, $v);
          //echo $v;
      }
      return $data;
     }    

     public function check_user($id,$password)
     {
      print( "No user name existed");
        $data = $this-> getCustomerById($id);
        if(count($data) == 0)
        {
          print( "No user name existed");
          return;
        }
        $account = $data[0];
        if($account->password == $password)
        {
          print( "login successed!");
        }
        else
        {
          print( "login failed");
        }
     }
}  
  
?> 