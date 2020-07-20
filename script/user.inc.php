<?php
require_once('user.inc.php');
if(isset($_POST['btnUpdate']))
{
  $name =$_POST['txtName'];
  $email = $_POST['txtEmail'];
  $address =$_POST['txtAddress'];
  $id = $_POST['txtIdUser'];
  $type = $_POST['type'];
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
    $update = $user->updateUser($id,$name,$address,$email,$type);
    if($update==1){
      echo '<script>alert("Succsessfully Updated");</script>';
      echo '<script>window.location = window.location</script>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
  }
}

if(isset($_POST['btnAddUser']))
{
  $name =$_POST['txtName'];
  $email = $_POST['txtEmail'];
  $address =$_POST['txtAddress'];
  $pass = $_POST['txtPassword'];
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
  elseif (empty($pass)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Password</div>';
    exit();
  }
  else{
    $user = new User($name,$email,$password,$access);
    $add = $user->addUser();
    if($add==1){
      echo '<script>alert("Succsessfully Added");</script>';
      echo '<script>window.location = window.location</script>';
      exit();
    }
    elseif ($add==2) {
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Username or Email already in use</div>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
  }
}

if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $user = new User();
  $delete = $user->deleteUser($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=users.php"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=users.php&delError"</script>';
      exit();
  }
}

if(isset($_GET['btnDeletePro']))
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

if(isset($_POST['btnUpdatePro']))
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


 if(isset($_POST['btnPassword']))
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
