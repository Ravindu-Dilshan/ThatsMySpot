<?php
require_once('controller/payment.control.php');
require_once('view/payment.view.php');
$payment = new PaymentController();
$paymentView = new PaymentView();
/*if(isset($_GET['btnUpdateStatus']))
{
  $PID =$_POST['txtPID'];
  $update = $payment->updatePaymentStatus($PID,"paid");
  $amount = $paymentView->viewAmount($PID);
  if($amount != false){
    $file = fopen("../api/income.csv","a");
    $line = array($PID, time() , $amount);
    fputcsv($file, $line);
    fclose($file);
  }
                        
  echo $update;
}*/
$paysafeApiKeyId = 'test_thatsmyspot';
$paysafeApiKeySecret = 'B-qa2-0-5f5f1a4f-0-302c02144b58cdd5c1675ce10cb829719dc345dcbf88910702142cd68e173350aa95f4d22d4b0c600909cabbd650';
$paysafeAccountNumber = '1001807740';
//https://login.test.netbanx.com
// The currencyCode should match the currency of your Paysafe account.
// The currencyBaseUnitsMultipler should in turn match the currencyCode.
// Since the API accepts only integer values, the currencyBaseUnitMultiplier is used convert the decimal amount into the accepted base units integer value.
$currencyCode = 'LKR'; // for example: CAD
$currencyBaseUnitsMultiplier = '1'; // for example: 100
require_once('../api/paysafe/source/paysafe.php');
use Paysafe\PaysafeApiClient;
use Paysafe\Environment;
use Paysafe\CardPayments\Authorization;
use Paysafe\CardPayments\Settlement;
if (isset($_GET['btnUpdateStatus'])) {
	$client = new PaysafeApiClient($paysafeApiKeyId, $paysafeApiKeySecret, Environment::TEST, $paysafeAccountNumber);
	try {
    $PID =$_POST['txtPID'];
    $amount = $paymentView->viewAmount($PID);
    $amount = number_format(($amount * $currencyBaseUnitsMultiplier), 0, '.', '');
    $merchantRef = $PID.'-'.time();
    if($amount != false){
		$auth = $client->cardPaymentService()->authorize(new Authorization(array(
			 'merchantRefNum' => $merchantRef,
			 'amount' => $amount,
			 'settleWithAuth' => true,
			 'card' => array(
				  'cardNum' => $_POST['card_number'],
				  'cvv' => $_POST['card_cvv'],
				  'cardExpiry' => array(
						'month' => $_POST['card_exp_month'],
						'year' => $_POST['card_exp_year']
				 )
			 ),
			 'billingDetails' => array(
				  'zip' => 'M5H 2N2'
		))));
    $update = $payment->updatePaymentStatus($PID,"paid");
    $file = fopen("../api/income.csv","a");
    $line = array($PID, time() , $amount);
    fputcsv($file, $line);
    fclose($file);
    $update = $payment->createSettlement($PID,$auth->id,$merchantRef);
    }                    
    echo $update;
	} catch (Paysafe\PaysafeException $e) {
    $error = $e->fieldErrors;
		if ($error[0]['field'] == "card.cardNum") {
			echo "Invalid card number";
    }
    elseif ($error[0]['field'] == "card.cvv") {
			echo "CVV code size must be between 3 and 4";
    }
    elseif ($error[0]['field'] == "card.cardExpiry.year") {
			echo "Invalid Year";
    }
    elseif ($error[0]['field'] == "card.cardExpiry.month") {
			echo "Invalid Month";
    }
		else{
			echo $e->getMessage();
		}
	}
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