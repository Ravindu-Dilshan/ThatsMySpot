<?php
require_once('class/place.cls.php');

if(isset($_GET['btnUpdatePlace']))
{
  $PID =$_POST['txtPID'];
  $name =$_POST['txtName'];
  $lat = $_POST['txtLat'];
  $long =$_POST['txtLong'];
  $avaliable =$_POST['txtAvailable'];
  $current =$_POST['txtCurrent'];
  if (empty($name)) {
    echo 'Please Enter a Name';
    exit();
  }
  elseif (empty($lat)) {
    echo 'Please Enter a Latitude';
    exit();
  }
  elseif (empty($long)) {
    echo 'Please Enter a Longtitude';
    exit();
  }
  elseif (empty($avaliable)) {
    echo 'Please Enter the Spot Count';
    exit();
  }
  else{
    $place = new Place($PID,$name,$lat,$long,$avaliable,$current);
    $update = $place->updatePlace();
    echo $update;

  }
}

elseif(isset($_GET['btnAddPlace']))
{
  $name =$_POST['txtName'];
  $lat = $_POST['txtLat'];
  $long =$_POST['txtLong'];
  $avaliable =$_POST['txtAvailable'];

  if (empty($name)) {
    echo 'Please Enter a Name';
    exit();
  }
  elseif (empty($lat)) {
    echo 'Please Enter a Latitude';
    exit();
  }
  elseif (empty($long)) {
    echo 'Please Enter a Longtitude';
    exit();
  }
  elseif (empty($avaliable)) {
    echo 'Please Enter the Spot Count';
    exit();
  }
  else{
    $place = new Place(null,$name,$lat,$long,$avaliable,0);
    $add = $place->addPlace();
    echo $add;
}
}


elseif(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $place = new Place($id,null,null,null,null,null);
  $delete = $place->deletePlace();
  echo '<script>window.location = "../place_manage.php?'.$delete.'"</script>';
}
else{
  echo 'Error Occured';
}

?>
