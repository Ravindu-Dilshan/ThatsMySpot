<?php
//require_once('class/parking.cls.php');
/*
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
*//*
if(isset($_GET['btnAddParking']))
{
  $plate =$_GET['txtPlate'];
  $place = $_GET['txtPlace'];
  $in =$_GET['txtIn'];
  $out =$_GET['txtOut'];
  $amount =$_GET['txtAmount'];
  $uid =$_GET['txtUID'];
  if (empty($plate)||empty($place)||empty($in)||empty($out)||empty($amount)||empty($uid)) {
    echo 'Please Enter a all data';
    exit();
  }
  else{
    $parking = new ParkingLog(null,$plate,$place,$in,$out,$amount,$uid);
    $add = $parking->addPlace();
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
*/
?>
