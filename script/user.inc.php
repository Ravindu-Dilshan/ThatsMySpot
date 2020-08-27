<?php
require_once('controller/user.control.php');
$user = new UserController();
if(isset($_GET['btnRegister']))
{
  $name =$_POST['txtName'];
  $email = $_POST['txtEmail'];
  $tele =$_POST['txtTelephone'];
  $code = $_POST['txtPassword'];
  if (empty($name)) {
    echo 'Please Enter a Username';
    exit();
  }
  elseif (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($tele)) {
    echo 'Please Enter a Telephone Number';
    exit();
  }
  elseif (empty($code)) {
    echo 'Please Enter a Password';
    exit();
  }
  elseif (strlen($code)<6) {
    echo 'Password Need at least 6 Characters';
    exit();
  }
  else{
    echo $user->createUser($name,$email,$code, $tele,"Customer");
  }
}
elseif(isset($_GET['btnUpdateUser']))
{
  $name =$_POST['txtName'];
  $email = $_POST['txtEmail'];
  $tele =$_POST['txtTelephone'];
  $id = $_POST['txtUID'];
  $access = $_POST['txtTypeUser'];
  if (empty($name)) {
    echo 'Please Enter a Username';
    exit();
  }
  elseif (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($tele)) {
    echo 'Please Enter a Address';
    exit();
  }
  else{
    echo $user->updateUserInfo($id,$name,$email,$tele,$access);
  }
}

elseif(isset($_GET['btnAddUser']))
{
  $name =$_POST['txtName'];
  $email = $_POST['txtEmail'];
  $tele =$_POST['txtTelephone'];
  $code = $_POST['txtPassword'];
  $access = $_POST['txtTypeUser'];
  if (empty($name)) {
    echo 'Please Enter a Username';
    exit();
  }
  elseif (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($tele)) {
    echo 'Please Enter a Telephone Number';
    exit();
  }
  elseif (empty($code)) {
    echo 'Please Enter a Password';
    exit();
  }
  elseif (strlen($code)<6) {
    echo 'Password Need at least 6 Characters';
    exit();
  }
  else{
    echo $user->createUser($name,$email,$code, $tele,$access);
  }
}

elseif(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $delete = $user->delete($id);
  echo '<script>window.location = "../user_manage.php?'.$delete.'"</script>';
}
/*
elseif(isset($_GET['btnDeletePro']))
{
  $id =$_GET['id'];
  $user = new User();
  $delete = $user->deleteUser($id);
  if($delete==1){
    $res = new Reservation();
    $res->dropTemp();
    session_start();
      session_unset();
      session_destroy();
      header('Location:../index.php');
      exit();
  }
  else{
      header('Location:../profile.php');
      exit();
  }
}
*/
elseif(isset($_GET['btnUpdatePro']))
{
  session_start();
    if(isset($_SESSION['loggedUser'])){
        $u = $_SESSION['loggedUser'];
    }else{
        header("Location:../login.php");
    }
  $email = $_POST['txtEmail'];
  $name = $_POST['txtName'];
  $tele = $_POST['txtTelephone'];
  if (empty($name)) {
    echo 'Please Enter a Username';
    exit();
  }
  elseif (empty($email)) {
    echo 'Please Enter a Email';
    exit();
  }
  elseif (empty($tele)) {
    echo 'Please Enter a Telephone number';
    exit();
  }
  else{
    $update = $user->updateProfileInfo($u['UID'],$name,$email, $tele);
    echo $update;
  }
}
elseif(isset($_GET['btnPassword']))
{
  session_start();
    if(isset($_SESSION['loggedUser'])){
        $u = $_SESSION['loggedUser'];
    }else{
        header("Location:../login.php");
    }
  $oPW = $_POST['txtOldPW'];
  $nPW = $_POST['txtNewPW'];
  $cPW = $_POST['txtCPW'];
  
  if (empty($oPW)) {
    echo 'Please Enter the existing Password';
    exit();
  }
  elseif (empty($nPW)) {
    echo 'Please Enter a new Password';
    exit();
  }
  elseif (empty($cPW)) {
    echo 'Please Enter the Confirm Password';
    exit();
  }
  elseif($nPW != $cPW){
    echo 'Password do not match';
    exit();
  }
  elseif($nPW == $oPW){
    echo 'New one cant be the old one';
    exit();
  }
  elseif (strlen($nPW)<6) {
    echo 'Password Too Short';
    exit();
  }
  else{
    $update = $user->changePassword($u['UID'],$oPW,$nPW);
    echo $update;
  }
}
else{
  echo '<script>window.location = window.location+"?msg=errorLog"</script>';
  exit();
}

?>