<?php
require_once('class/payment.cls.php');
if(isset($_GET['btnUpdateStatus']))
{
  $PID =$_POST['txtPID'];
  $payment = new Payment($PID,null,null,"paid");
  $update = $payment->updatePayment();

  $amount = $payment->getPaymentAmount();
  if($amount != false){
    $file = fopen("../api/income.csv","a");
    $line = array($PID, time() , $amount);
    fputcsv($file, $line);
    fclose($file);
  }
                        
  echo $update;
}
/*
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