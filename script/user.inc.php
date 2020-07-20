<?php
require_once('class/user.cls.php');
if(isset($_GET['btnUpdateUser']))
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
    $user = new User($id,$name,$email,null, $tele,$access);
    $update = $user->updateUser();
    echo $update;
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
  else{
    $user = new User(null,$name,$email,$code, $tele,$access);
    $add = $user->addUser();
    echo $add;
  }
}

elseif(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $user = new User($id,null,null,null,null,null);
  $delete = $user->deleteUser();
  echo '<script>window.location = "../user_manage.php?'.$delete.'"</script>';
}

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

elseif(isset($_POST['btnUpdatePro']))
{
  $id = $_POST['txtid'];
  $name = $_POST['txtName'];
  $address = $_POST['txtAddress'];
  $email = $_POST['txtEmail'];
  if (empty($name)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Username</div>';
    exit();
  }
  elseif (empty($email)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Email</div>';
    exit();
  }
  elseif (empty($address)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Address</div>';
    exit();
  }
  else{
    $user = new User();
    $update = $user->updateProfile($id,$name,$address,$email);
    if($update==1){
      echo '<div class="alert alert-success float-right w-100 text-center" role="alert">Updated</div>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
  }
}


elseif(isset($_POST['btnPassword']))
{
  $id =$_POST['txtId'];
  $oPW = $_POST['oldPw'];
  $nPW = $_POST['newPw'];
  $cPW = $_POST['cPw'];
  $user = new User();
  
  if (empty($oPW)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter the existing Password</div>';
    exit();
  }
  elseif (empty($nPW)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a new Password</div>';
    exit();
  }
  elseif (empty($cPW)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter the Confirm Password</div>';
    exit();
  }
  elseif($nPW != $cPW){
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Password do not match</div>';
    exit();
  }
  else{
    $user = new User();
    $update = $user->changePw($id,$oPW,$nPW);
      if($update==1){
      echo '<div class="alert alert-success float-right w-100 text-center" role="alert">Successfully changed</div>';
      exit();
      }
      elseif($update==2){
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Incorrect Password</div>';
        exit();
      }
      else{
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
        exit();
      }
  }
}
else{
  echo '<script>window.location = window.location+"?msg=errorLog"</script>';
  exit();
}

?>
