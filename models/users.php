<?php
//require_once('Database.php');

class User
{

  // Function to add a new user to the database
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

  // Function to sign in a registered user
  public function signIn($email, $password, $db){
    $sql = "SELECT * FROM users
    WHERE email = :email";
    $pst =$db->prepare($sql);
    $pst->bindParam(':email', $email);
    $pst->execute();
    $u= $pst->fetch(PDO::FETCH_OBJ);
    return $u;
    }

  //Function to get a single user
  public function getUser($id, $db){
    $sql= "SELECT * FROM users
    WHERE id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    $u=$pst->fetch(PDO::FETCH_OBJ);
    return $u;
  }

  public function editUser($id, $fname, $lname, $email, $address, $password, $db){
    $sql = "UPDATE users
    set first_name = :first_name,
    last_name = :last_name,
    email = :email,
    address = :address,
    password = :password
    WHERE id=:id";
    $pst =$db->prepare($sql);
    $pst->bindParam(':id', $id);
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
