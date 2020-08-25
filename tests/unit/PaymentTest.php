<?php
//session_start();
/* require_once(__DIR__.'/../../script/class/payment.cls.php');
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    //give valid datafrom the database
    private  $PID = "38";
	private  $amount = "2";
	private  $UID = "21";
	private  $status = "paid";

    public function test_update(){
        $payment = new Payment($this->PID,null,null,$this->status);
        $update = $payment->updatePayment();
        $this->assertEquals("Success",$update);
    }
    public function test_getAmount(){
        $payment = new Payment($this->PID,null,null,null);
        $result = $payment->getPaymentAmount();
        $this->assertEquals($this->amount,$result);
    }
    public function test_viewAll(){
        $payment = new Payment(null,null,null,null);
        $result = $payment->getAllPayments();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }
    public function test_viewAllbyUser(){
        $payment = new Payment(null,null,$this->UID,null);
        $result = $payment->getAllByUser();
        $row = mysqli_fetch_assoc($result);
        $this->assertTrue($row>0);
        $this->assertEquals($this->UID,$row['UID']);
    }
    public function test_count(){
        $payment = new Payment(null,null,$this->UID,null);
        $result = $payment->getUnpaidCount();
        $this->assertTrue($result!=null);
    }
} */