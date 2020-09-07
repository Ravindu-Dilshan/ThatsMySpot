<?php
//session_start();
/*require_once(__DIR__.'/../../script/controller/place.control.php');
require_once(__DIR__.'/../../script/view/place.view.php');
use PHPUnit\Framework\TestCase;

class PlaceTest extends TestCase
{
	private static $controller = null;
    private static $view = null;

    public function test_add(){
        $placeController = $this::getController();
        $placeView = $this::getView();
        $result = $placeController->createPlace("JAFFNA", "80.12345600", "30.12345600", "100", "0");//give UID registered UID
        $this->assertEquals("Success",$result);
        $row = $placeView->lastRow();
        $this->assertEquals("JAFFNA",$row['namePlace']);
        $this->assertEquals("80.12345600",$row['latitude']);
        $this->assertEquals("30.12345600",$row['longtitude']);
        $this->assertEquals("100",$row['available']);
        $this->assertEquals("0",$row['current']);
    }

    public function test_update(){
        $placeController = $this::getController();
        $placeView = $this::getView();
        $row = $placeView->lastRow();
        $PID = $row['PID'];
        $result = $placeController->updatePlaceInfo($PID,"JAFFNAUP", "90.12345600", "40.12345600", "150", "50");
        $row = $placeView->lastRow();
        $this->assertEquals("JAFFNAUP",$row['namePlace']);
        $this->assertEquals("90.12345600",$row['latitude']);
        $this->assertEquals("40.12345600",$row['longtitude']);
        $this->assertEquals("150",$row['available']);
        $this->assertEquals("50",$row['current']);
    }
    public function test_update_counter(){
        $placeController = $this::getController();
        $placeView = $this::getView();
        $row = $placeView->lastRow();       
        $PID = $row['PID'];
        $current = $row['current'];
        $result = $placeController->updatePlaceCurrent($PID,"in");
        $row = $placeView->lastRow();
        $this->assertEquals($current+1,$row['current']);
        $result = $placeController->updatePlaceCurrent($PID,"out");
        $row = $placeView->lastRow();
        $this->assertEquals($current,$row['current']);
    }
    public function test_viewAll(){
        $placeView = $this::getView();
        $result = $placeView->viewPlaces();
        $this->assertFalse(is_null($result));
    }
    public function test_viewRaw(){
        $placeView = $this::getView();
        $result = $placeView->viewPlaceRaw();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }
    public function test_viewAllLog(){
        $placeView = $this::getView();
        $result = $placeView->viewPlaceLog();
        $this->assertFalse(is_null($result));
    }
    public function test_viewAllUser(){
        $placeView = $this::getView();
        $result = $placeView->viewPlaceForUser();
        $this->assertFalse(is_null($result));
    }
    public function test_delete(){
        $placeController = $this::getController();
        $placeView = $this::getView();
        $row = $placeView->lastRow();
        $result = $placeController->delete($row['PID']);
        $this->assertEquals("Success",$result);
    }
    public function test_getSet(){
        $u = $this::getView();
        $u->setPID("1");
        $this->assertEquals("1",$u->getPID());
        $u->setNamePlace("TEST");
        $this->assertEquals("TEST",$u->getNamePlace());
        $u->setLatitude("40.12345600");
        $this->assertEquals("40.12345600",$u->getLatitude());
        $u->setLongtitude("50.12345600");
        $this->assertEquals("50.12345600",$u->getLongtitude());
        $u->setAvailable("100");
        $this->assertEquals("100",$u->getAvailable());
        $u->setCurrent("10");
        $this->assertEquals("10",$u->getCurrent());
    }
    public static function getController()
	{
		if (self::$controller == null)
		{
		self::$controller = new PlaceController();
		}
		return self::$controller;
    }
    public static function getView()
	{
		if (self::$view == null)
		{
		self::$view = new PlaceView();
		}
		return self::$view;
	}
}*/