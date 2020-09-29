<?php
/*This control all the payment interactions*/
require_once(dirname(__DIR__).'./model/payment.cls.php');
class PaymentController extends Payment
{
	public function updatePaymentStatus($PID,$status){
		$this->setPID($PID);
		$this->setStatus($status);
		return $this->updatePayment();
	}

	public function createSettlement($PID,$txn,$merID,$date){
		$this->setPID($PID);
		return $this->addSettlement($txn,$merID,$date);
	}
}
 ?>