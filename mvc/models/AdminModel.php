<?php


class AdminModel extends MySQLDatabase{
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
 // select Admin     
 public function getAdmins()
 {
   $sqlStatement = "SELECT * FROM admin";
   try {    
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $data = [];
     foreach ($this->db->query($sqlStatement) as $row) {
       array_push($data, $row);
       //print $v;
     }
     $data =array_values($data);
     return $data;
   } catch (PDOException $e) {

     $e->getMessage();
   }
 }
    public function getAdminById($email)
    {
      $stmt = $this->db->prepare("SELECT * FROM admin WHERE email=:email");
      $stmt->execute(['email' => $email]);  
      $data = $stmt->fetch();
      return $data;
    }

    public function check_admin($email, $password)
    {
      $data = $this->getAdminById($email);
      if ($data == null) {
        print("No user name existed");
        return;
      }
      $account = $data;    
      if ($account['password'] == $password) {
        print("login successed!");
        $_SESSION['email']=$email;
        header("Refresh:0");
      } else {
        print("login failed, wrong password!");
      }
    }



}
