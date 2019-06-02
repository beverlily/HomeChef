<?php
session_start();

define( 'ROOT', '/HomeChef' );

require_once 'models/database.php';
require_once 'models/users.php';
require_once 'models/Order.php';
require_once 'models/Cart.php';
require_once 'models/products.php';
require_once 'models/Chef.php';
require_once 'controller/userController.php';
require_once 'controller/chefController.php';
require_once 'controller/productController.php';




$_SERVER['REQUEST_URI'] = str_replace( ROOT, '', $_SERVER['REQUEST_URI'] );

//http://localhost:8888/about.php?var=1&var2=2
$vars = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
if(count($vars)%2==1)
{
  $page=$vars[0];
  array_shift($vars);
}
else {
  $page = 'index';
}

for($i =0; $i<count($vars); $i +=2)
{
  $_GET[$vars[$i]]=$vars[$i+1];
}


// include('config/global.php');
// include('config/database.php');
// include('config/functions.php');

include('views/'.$page.'.php');
// include('views/'.$page.'.php');
