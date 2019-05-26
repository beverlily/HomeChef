<?php
session_start();
require_once '../../models/database.php';
require_once '../../models/users.php';


$db = Database::getDb();
$user = new User;


// Logic for registering a new user
// Grabbing variables from the form and hashing the password
if(isset($_POST['add_user'])){
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);
  $address = $_POST['address'];

//new user validation and database interaction
  if(empty($fname)|| empty($lname)||empty($email)||empty($password)|| empty($address)){
    echo "All fields are required";
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "please enter a valid email address";
        }else{ $c = $user->addUser($fname, $lname, $email, $address, $password, $db);
          if($c){
          echo "User created";
            }else{
            echo "Error adding user";
          }
        }
}

// Logic for logging in
//Grabbing variables from the form
if(isset($_POST['sign_in'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

//Connecting to database and confirming user input
  $c=$user->signIn($email, $password, $db);
  if($c && password_verify($password, $c->password)){
    $_SESSION['USERID']= $c->id;
    header('Location:user_profile.php');
  }else{
    echo "problem logging in";
  }
}

//Logic for getting a single users information




 ?>
