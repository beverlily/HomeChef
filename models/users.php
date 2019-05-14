<?php
require_once('Database.php');

class user
{
  // private $db;
  // private $fname;
  // private $lname;
  // private $email;
  // private $password;
  // private $address;
  //
  // public function __construct($db)
  // {
  //   $this->db = $db;
  // }

  public function addUser($fname, $lname, $email, $address, $password, $db)
  {
    $sql = "INSERT INTO users (first_name, last_name, email, password, address)
    VALUES (:first_name, :last_name, :email, :password, :address)";
    $pst =$db->prepare($sql);
    $pst->bindParam(':first_name', $fname);
    $pst->bindParam(':last_name', $lname);
    $pst->bindParam(':email', $email);
    $pst->bindParam(':password', $password);
    $pst->bindParam(':address', $address);

    $count = $pst->execute();
    return $count;
  
  }


}

 ?>
