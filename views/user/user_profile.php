<?php
require_once '../../controller/userController.php';
$userid = $_SESSION['USERID'];
$this_user=$user->getUser($userid,$db);
 ?>

 <main id="main">
  <ul>
    <li> First Name: <?=$this_user->first_name?> </li>
    <li> Last Name: <?=$this_user->last_name?></li>
    <li> Email Address: <?=$this_user->email?></li>
    <li> Address: <?=$this_user->address?></li>
  </ul>
 </main>