<?php
require_once('controller/vehicle.control.php');
$vehicle = new VehicleController();
if(isset($_GET['btnUpdateVehicle']))
{
  $type =$_POST['txtType'];
  $plate = strtoupper($_POST['txtPlate']);
  $color =$_POST['txtColor'];
  $VID = $_POST['txtVID'];
  session_start();
  $UID = $_SESSION['loggedUser']['UID'];
  if (empty($type)) {
    echo 'Please Enter a Type';
    exit();
  }
  elseif (empty($plate)) {
    echo 'Please Enter a Plate';
    exit();
  }
  elseif (empty($color)) {
    echo 'Please Enter a Color';
    exit();
  }
  else{
    $update = $vehicle->updateVehicleInfo($VID,$plate,$color,$type, $UID);
    echo $update;
  }
}

elseif(isset($_GET['btnAddVehicle']))
{
  $type =$_POST['txtType'];
  $plate = strtoupper($_POST['txtPlate']);
  $color =$_POST['txtColor'];
  session_start();
  $UID = $_SESSION['loggedUser']['UID'];
  if (empty($type)) {
    echo 'Please Enter a Type';
    exit();
  }
  elseif (empty($plate)) {
    echo 'Please Enter a Plate';
    exit();
  }
  elseif (empty($color)) {
    echo 'Please Enter a Color';
    exit();
  }
  else{
    $add = $vehicle->createVehicle($plate,$color,$type, $UID);
    echo $add;
  }
}

elseif(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $delete = $vehicle->delete($id);
  echo '<script>window.location = "../userapp/vehicle_manage.php?'.$delete.'"</script>';
}
else{
  echo '<script>window.location = window.location+"?msg=errorLog"</script>';
  exit();
}

?>
