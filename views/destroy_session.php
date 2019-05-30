<?php
session_start();
//destroy just user id
// unset($_SESSION['USERID']);

//destroy all the session variable
$_SESSION = [];

//destroy session id
session_destroy();

header('Location:'. ROOT);
