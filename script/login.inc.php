<?php
require_once('controller/user.control.php');
if(isset($_GET['btnLogin']))
{
  $email =$_POST['txtEmail'];
  $pw = $_POST['txtPassword'];
  $user = new UserController();
  if (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($pw)) {
    echo 'Please Enter a Password';
    exit();
  }
  else{
    echo $user->loginUser($email,$pw);
    exit();
  }
}
else{
	echo 'no btn login';
	exit();
}
?>
