<?php
require_once('class/place.cls.php');
if(isset($_POST['btnUpdate']))
{
  $name =$_POST['txtName'];
  $disc = $_POST['txtDiscrip'];
  $price =$_POST['txtPrice'];
  $id = $_POST['txtIdPack'];
  if (empty($name)) {
    echo 'Please Enter a Name';
    exit();
  }
  elseif (empty($disc)) {
    echo 'Please Enter a Discription';
    exit();
  }
  elseif (empty($price)) {
    echo 'Please Enter a Price';
    exit();
  }
  else{
    $place = new Place($PID,$namePlace,$latitude,$longtitude,$available,$current);
    $update = $package->updatePlace();
    echo $update;

  }
}

if(isset($_POST['btnAddPack']))
{
  $name =$_POST['txtName'];
  $disc = $_POST['txtDiscrip'];
  $price =$_POST['txtPrice'];

  if (empty($name)) {
    echo 'Please Enter a Name';
    exit();
  }
  elseif (empty($disc)) {
    echo 'Please Enter a Discription';
    exit();
  }
  elseif (empty($price)) {
    echo 'Please Enter a Price';
    exit();
  }
  else{
    $place = new Place($PID,$namePlace,$latitude,$longtitude,$available,$current);
    $add = $package->addPlace();
    echo $add;
}
}


if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $place = new Place($PID,$namePlace,$latitude,$longtitude,$available,$current);
  $delete = $place->deletePlace();
  echo '<script>window.location = "../place_manage.php?'.$delete.'"</script>';
}

?>
