<?php
$db = Database::getDb();
$product = new Product();
$orderItem = new OrderItem();

if(isset($_POST['add_product'])){
   $chefid = $chef->getChef($_SESSION['USERID']);
   $id = $chefid['id'];

   $title = $_POST['title'];
   $description = $_POST['description'];
   $price = $_POST['price'];

   $imgFile = $_FILES['product_image']['name'];
   $tmp_dir = $_FILES['product_image']['tmp_name'];
   $imgSize = $_FILES['product_image']['size'];

   if(empty($title)){
     echo $errMSG = "Please provide a title";
    }
    else if(empty($description)){
     echo $errMSG = "Please provide a short description";
    }
    else if(empty($price)){
     echo $errMSG = "Please enter a price";
    }
    else if(empty($imgFile)){
     echo $errMSG = "Please Select Image File.";
    }
    else
    {
     $upload_dir = 'images/'; // upload directory
     $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
     // valid image extensions
     $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
     // rename uploading image
     $image = rand(1000,1000000).".".$imgExt;
     // allow valid image file formats
     if(in_array($imgExt, $valid_extensions)){
      // check file size '5MB'
      if($imgSize < 5000000)    {
       move_uploaded_file($tmp_dir,$upload_dir.$image);
      }
      else{
       echo $errMSG = "Sorry, your file is too large.";
      }
     }
     else{
       echo $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     }
    }
    if(!isset($errMSG))
   {

     $count = $product->addProduct($id, $title, $description, $image, $price, $db);

     if($count) {
         // echo "Chef profile has been created.";
         header ('Location: chef_details');
     } else {
         echo "Problem adding product.";
     }
   }

}

if(isset($_POST['view-product'])){
  $_SESSION['PRODUCTID']= $_POST['product_id'];
  header('Location:product_details');
}

if(isset($_POST["add-to-cart"])){
	$product_id = $_POST['id'];
	$order_id = $_SESSION['ORDERID'];
	$quantity = $_POST['quantity'];
	$addToCart = $orderItem->addOrderItem($order_id, $product_id, $quantity);
  if(!$addToCart){
    $_SESSION['addCartErrorMessage'] = "Something went wrong";
  }
  else{
    $_SESSION['addCartSuccessMessage'] = "Item has been added to cart ";
    header('Location:all_products');
  }
}
