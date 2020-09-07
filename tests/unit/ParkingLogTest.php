<?php
//session_start();
/*require_once(__DIR__.'/../../script/controller/parking.control.php');
require_once(__DIR__.'/../../script/view/parking.view.php');
use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase
{
    private static $controller = null;
    private static $view = null;

    //public function test_add(){
    //    $parkingController = $this::getController();
    //    $parkingView = $this::getView();
    //    $result = $parkingController->createParkingLog("TEST","Maharagama","2020-08-27 13:53:36","2020-08-27 14:53:36","50","1");//give UID registered UID
    //    $this->assertEquals("Success",$result);
    //    $row = $parkingView->lastRow();
    //    $this->assertEquals("TEST",$row['plate']);
    //    $this->assertEquals("Maharagama",$row['place']);
    //    $this->assertEquals("2020-08-27 13:53:36",$row['in_time']);
    //    $this->assertEquals("2020-08-27 14:53:36",$row['out_time']);
    //    $this->assertEquals("50",$row['amount']);
    //   $this->assertEquals("1",$row['UID']);
    //}

    public function test_viewAll(){
        $parkingView = $this::getView();
        $result = $parkingView->viewParkingLog(false,null,null);
        $this->assertFalse(is_null($result));
        $result = $parkingView->viewParkingLog(true,"2020-07-27","2020-08-05");
        $this->assertFalse(is_null($result));
    }

    public function test_viewAllByMonth(){
        $parkingView = $this::getView();
        $result = $parkingView->viewAmountByMonth();
        $this->assertFalse(is_null($result));
    }

    public function test_viewAllByMonthLocation(){
        $parkingView = $this::getView();
        $result = $parkingView->viewAmountByMonthLocation("Maharagam");
        $this->assertFalse(is_null($result));
    }
    public function test_incomeMonth(){
        $parkingView = $this::getView();
        $result = $parkingView->viewCurrentAmount(False);
        $this->assertTrue($result!=0);
    }

    public function test_incomeYear(){
        $parkingView = $this::getView();
        $result = $parkingView->viewCurrentAmount(True);
        $this->assertTrue($result!=0);
    }

    public function test_getSet(){
        $u = $this::getView();
        $u->setPID("1");
        $this->assertEquals("1",$u->getPID());
        $u->setPlate("TEST");
        $this->assertEquals("TEST",$u->getPlate());
        $u->setPlace("Maharagama");
        $this->assertEquals("Maharagama",$u->getPlace());
        $u->setIn("5012345600");
        $this->assertEquals("5012345600",$u->getIn());
        $u->setOut("6012345600");
        $this->assertEquals("6012345600",$u->getOut());
        $u->setAmount("100");
        $this->assertEquals("100",$u->getAmount());
        $u->setUID("1");
        $this->assertEquals("1",$u->getUID());
    }

    public static function getController()
	{
		if (self::$controller == null)
		{
		self::$controller = new ParkingLogController();
		}
		return self::$controller;
    }
    public static function getView()
	{
		if (self::$view == null)
		{
		self::$view = new ParkingLogView();
		}
		return self::$view;
    }
    
    
    //public function test_viewByUser(){
    //    $parking = new ParkingLog(null,null,null,null,null,null,$this->UID);
    //    //dates should be valid
    //    $result = $parking->getAllByUser();
    //    $row = mysqli_fetch_assoc($result);
    //    $this->assertTrue($row>0);
    //    $this->assertEquals($this->UID,$row['UID']);
    //}
}*/