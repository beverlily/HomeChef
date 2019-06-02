<?php
$db = Database::getDb();
$user = new User();
$cart = new Cart();

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
        }else{
		  $c = $user->addUser($fname, $lname, $email, $address, $password, $db);
          if($c){
            $_SESSION['USERID']= $c;
			//when user creates an account, they start off with an empty cart
		    $cart->createCart($_SESSION['USERID'],$address);
            header('Location:user_profile');
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
//Then checking if they are a chef or not to see which profile page to take them too
  $c=$user->signIn($email, $password, $db);
  if($c && password_verify($password, $c->password)){
    $_SESSION['USERID']= $c->id;
    $this_user=$user->getUser($_SESSION['USERID'],$db);
      if($this_user->IsChef == 1){
        header('Location:chef_details');
      }else{
        header('Location:user_profile');
      }
  }else{
    echo "problem logging in";
  }
}

//Logic for editng a users PROFILE

if(isset($_POST['edit_user'])){
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  if(empty($_POST['password'])){
    $this_user=$user->getUser($_SESSION['USERID'],$db);
    $password = $this_user->password;
  }else{
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
  }
  $address = $_POST['address'];
  $id = $_SESSION['USERID'];

  $c = $user->editUser($id, $fname, $lname, $email, $address, $password, $db);
    if($c){
    header('Location:user_profile');
      }else{
      echo "Error adding user";
    }
  }






 ?>
