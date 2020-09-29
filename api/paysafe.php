<?php
/*$paysafeApiKeyId = 'test_thatsmyspot';
$paysafeApiKeySecret = 'B-qa2-0-5f5f1a4f-0-302c02144b58cdd5c1675ce10cb829719dc345dcbf88910702142cd68e173350aa95f4d22d4b0c600909cabbd650';
$paysafeAccountNumber = '1001807740';
//https://login.test.netbanx.com
// The currencyCode should match the currency of your Paysafe account.
// The currencyBaseUnitsMultipler should in turn match the currencyCode.
// Since the API accepts only integer values, the currencyBaseUnitMultiplier is used convert the decimal amount into the accepted base units integer value.
$currencyCode = 'CAD'; // for example: CAD
$currencyBaseUnitsMultiplier = '100'; // for example: 100
require_once('./paysafe/source/paysafe.php');
use Paysafe\PaysafeApiClient;
use Paysafe\Environment;
use Paysafe\CardPayments\Authorization;
use Paysafe\CardPayments\Settlement;
use Paysafe\CardPayments\ReFund;
use Paysafe\CardPayments\Verification;
	$client = new PaysafeApiClient($paysafeApiKeyId, $paysafeApiKeySecret, Environment::TEST, $paysafeAccountNumber);
	try {*/
		/*$response = $client->cardPaymentService()->settlement(new Settlement(array(
            'merchantRefNum' => "e0cb42e1-82e6-4b7c-9a40-e61eb97c201f",
            'authorizationID' => '87-1600076913'.' '
       )));*/
/*
       $response = $client->cardPaymentService()->cancelSettlement(new Settlement(array(
        'id' => 'a01b6d42-d944-4cd7-b481-5c579681545e'
        )));*/
/*
        $response = $client->cardPaymentService()->getSettlement(new Settlement(array(
            'id' => '1741ac83-3556-4392-9980-64eaa0eae4aa'
       )));*/
       
/*
       $response = $client->cardPaymentService()->settlement(new Settlement(array(
        'merchantRefNum' => "67-1600079500",
        'authorizationID' => "b0cdfee3-de23-45d0-8b36-ca515b3e74e5"
   )));*/
 /* 
   $response = $client->cardPaymentService()->refund(new Refund(array(
    'merchantRefNum' => "57-1600074265",
    'settlementID' => "5911747-3259-4153-8bf2-ea54fec64d17"
)));*/
/*
$response = $client->cardPaymentService()->getVerifications(new Verification(array(
    'merchantRefNum' => "67-1600079500"
)));*/
/*
$client->cardPaymentService()->approveHeldAuth(new Authorization(array(
    'id' => '1741ac83-3556-4392-9980-64eaa0eae4aa'
)));

   var_dump($response);
	} catch (Paysafe\PaysafeException $e) {
		echo '<pre>';
		var_dump($e->getMessage());
		if ($e->fieldErrors) {
			var_dump($e->fieldErrors);
			echo ($e->fieldErrors[0]['field']);
		}
		if ($e->links) {
			var_dump($e->links);
		}
		echo '</pre>';
	} catch (Paysafe\PaysafeException $e) {
		//for debug only, these errors should be properly handled before production
		var_dump($e->getMessage());
	}
*/
?>
