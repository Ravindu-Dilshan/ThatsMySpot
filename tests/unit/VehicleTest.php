<?php
//session_start();
/*require_once(__DIR__.'/../../script/controller/vehicle.control.php');
require_once(__DIR__.'/../../script/view/vehicle.view.php');
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    private static $controller = null;
    private static $view = null;

    public function test_add(){
        $vehicleController = $this::getController();
        $vehicelView = $this::getView();
        $result = $vehicleController->createVehicle("PLATE", "COLOR", "TYPE", "1");//give UID registered UID
        $this->assertEquals("Success",$result);
        $row = $vehicelView->lastRow();
        $this->assertEquals("PLATE",$row['plate']);
        $this->assertEquals("COLOR",$row['color']);
        $this->assertEquals("TYPE",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_update(){
        $vehicleController = $this::getController();
        $vehicelView = $this::getView();
        $row = $vehicelView->lastRow();
        $VID = $row['VID'];
        $result = $vehicleController->updateVehicleInfo($VID,"PLATEUP", "COLORUP", "TYPEUP", "1");
        $row = $vehicelView->lastRow();
        $this->assertEquals("PLATEUP",$row['plate']);
        $this->assertEquals("COLORUP",$row['color']);
        $this->assertEquals("TYPEUP",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_view(){
        $vehicelView = $this::getView();
        $row = $vehicelView->lastRow();
        $result = $vehicelView->viewVehicle($row['VID']);
        $this->assertEquals("PLATEUP",$row['plate']);
        $this->assertEquals("COLORUP",$row['color']);
        $this->assertEquals("TYPEUP",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_view_by_plate(){
        $vehicelView = $this::getView();
        $row = $vehicelView->lastRow();
        $result = $vehicelView->viewByPlate($row['plate']);
        $this->assertEquals("COLORUP",$row['color']);
        $this->assertEquals("TYPEUP",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_viewAllLog(){
        $vehicelView = $this::getView();
        $result = $vehicelView->viewVehicleLog();
        $this->assertFalse(is_null($result));
    }
    public function test_viewAllUser(){
        $vehicelView = $this::getView();
        $result = $vehicelView->viewVehiclesByUser("1");
        $this->assertFalse(is_null($result));
    }
    public function test_delete(){
        $vehicleController = $this::getController();
        $vehicelView = $this::getView();
        $row = $vehicelView->lastRow();
        $result = $vehicleController->delete($row['VID']);
        $this->assertEquals("Success",$result);
    }
    public function test_getSet(){
        $u = $this::getView();
        $u->setVID("1");
        $this->assertEquals("1",$u->getVID());
        $u->setPlate("TEST");
        $this->assertEquals("TEST",$u->getPlate());
        $u->setColor("WHITE");
        $this->assertEquals("WHITE",$u->getColor());
        $u->setType("TYPE 1");
        $this->assertEquals("TYPE 1",$u->getType());
        $u->setUID("1");
        $this->assertEquals("1",$u->getUID());
    }

    public static function getController()
	{
		if (self::$controller == null)
		{
		self::$controller = new VehicleController();
		}
		return self::$controller;
    }
    public static function getView()
	{
		if (self::$view == null)
		{
		self::$view = new VehicleView();
		}
		return self::$view;
	}
}*/