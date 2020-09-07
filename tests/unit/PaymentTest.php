<?php
//session_start();
/*require_once(__DIR__.'/../../script/controller/payment.control.php');
require_once(__DIR__.'/../../script/view/payment.view.php');
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    private static $controller = null;
    private static $view = null;

    public function test_update(){
        $paymentController = $this::getController();
        $paymentView = $this::getView();
        $result = $paymentController->updatePaymentStatus("38","Paid");//give PID a valid PID
        $this->assertEquals("Success",$result);
    }
    public function test_getAmount(){
        $paymentView = $this::getView();
        $result = $paymentView->viewAmount("38");
        $this->assertEquals("2",$result);
    }
    public function test_viewAllLog(){
        $paymentView = $this::getView();
        $result = $paymentView->viewPaymentsLog();
        $this->assertFalse(is_null($result));
    }
    public function test_viewAllUser(){
        $paymentView = $this::getView();
        $result = $paymentView->viewPaymentsByUser("1");
        $this->assertFalse(is_null($result));
    }

    public function test_count(){
        $paymentView = $this::getView();
        $result = $paymentView->viewUnpaidCount("1");
        $this->assertTrue($result!=null);
    }

    public function test_getSet(){
        $u = $this::getView();
        $u->setPID("1");
        $this->assertEquals("1",$u->getPID());
        $u->setAmount("1000");
        $this->assertEquals("1000",$u->getAmount());
        $u->setUID("1");
        $this->assertEquals("1",$u->getUID());
        $u->setStatus("PAID");
        $this->assertEquals("PAID",$u->getStatus());
    }

    public static function getController()
	{
		if (self::$controller == null)
		{
		self::$controller = new PaymentController();
		}
		return self::$controller;
    }
    public static function getView()
	{
		if (self::$view == null)
		{
		self::$view = new PaymentView();
		}
		return self::$view;
	}
}*/