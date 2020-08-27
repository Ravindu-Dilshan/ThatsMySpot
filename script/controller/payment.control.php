<?php
require_once(dirname(__DIR__).'./model/payment.cls.php');
class PaymentController extends Payment
{
	public function updatePaymentStatus($PID,$status){
		$this->setPID($PID);
		$this->setStatus($status);
		return $this->updatePayment();
	}
}
 ?>