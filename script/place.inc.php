<?php
require_once('controller/place.control.php');
$place = new PlaceController();
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
    $update = $place->updatePlaceInfo($PID,$name,$lat,$long,$avaliable,$current);
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
    $add = $place->createPlace($name,$lat,$long,$avaliable,0);
    echo $add;
}
}


elseif(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $delete = $place->delete($id);
  echo '<script>window.location = "../place_manage.php?'.$delete.'"</script>';
}
else{
  echo 'Error Occured';
}

?>
