<?php
/* session_start();
require_once(__DIR__.'/../../script/class/vehicle.cls.php');
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    private $plate = "TEST12";
    private $color = "White";
    private $type = "Lamborghini";
    private $UID = "1";

    public function test_add(){
        $vehicle = new Vehicle(null,$this->plate,$this->color,$this->type, $this->UID);
        $add = $vehicle->addVehicle();
        $this->assertEquals("Success",$add);
        $row = $vehicle->getLastInserted();
        $this->assertEquals($this->plate,$row['plate']);
        $this->assertEquals($this->color,$row['color']);
        $this->assertEquals($this->type,$row['type']);
        $this->assertEquals($this->UID,$row['UID']);
    }
    public function test_update(){
        $vehicle = new Vehicle(null,"UPDATE1234","Orange","Bugatti","1");
        $vehicle->setVID($vehicle->getLastInserted()['VID']);
        $update = $vehicle->updateVehicel();
        $this->assertEquals("Success",$update);
        $row = $vehicle->getLastInserted();
        $this->assertEquals("UPDATE1234",$row['plate']);
        $this->assertEquals("Orange",$row['color']);
        $this->assertEquals("Bugatti",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_view(){
        $vehicle = new Vehicle(null,null,null,null,null);
        $result = $vehicle->getByID($vehicle->getLastInserted()['VID']);
        $row = mysqli_fetch_assoc($result);
        $this->assertTrue($row>0);
        $this->assertEquals("UPDATE1234",$row['plate']);
        $this->assertEquals("Orange",$row['color']);
        $this->assertEquals("Bugatti",$row['type']);
        $this->assertEquals("1",$row['UID']);
    }
    public function test_viewAll(){
        $vehicle = new Vehicle(null,null,null,null,null);
        $result = $vehicle->getAllVehicles();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }
    public function test_delete(){
        $vehicle = new Vehicle(null,null,null,null,null);
        $vehicle->setVID($vehicle->getLastInserted()['VID']);
        $add = $vehicle->deleteVehicle();
        $this->assertEquals("Success",$add);
    } 
}*/