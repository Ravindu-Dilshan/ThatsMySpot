<?php
require_once('class/user.cls.php');
if(isset($_GET['btnLogin']))
{
  $email =$_POST['txtEmail'];
  $pw = $_POST['txtPassword'];
  $user = new User(null,null,$email,$pw,null,null);
  $user->setEmailUser($email);
  $user->setPasswordUser($pw);
  $login = $user->login();
  if (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($pw)) {
    echo 'Please Enter a Password';
    exit();
  }
  else{
    echo $login;
    exit();
  }
}
else{
	echo 'no btn login';
	exit();
}
?>
