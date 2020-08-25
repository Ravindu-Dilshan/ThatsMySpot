<?php
/* session_start();
require_once(__DIR__.'/../../script/class/place.cls.php');
use PHPUnit\Framework\TestCase;

class PlaceTest extends TestCase
{
	private  $name = "testName";
	private  $latitude = "80.11111111";
	private  $longtitude = "36.22222222";
	private  $available = "20";
	private  $current = "0";

    public function test_add(){
        $place = new Place(null,$this ->name,$this ->latitude, $this ->longtitude ,$this ->available,$this ->current);
        $add = $place->addPlace();
        $this->assertEquals("Success",$add);
        $row = $place->getLastInserted();
        $this->assertEquals($this->name,$row['namePlace']);
        $this->assertEquals($this->latitude,$row['latitude']);
        $this->assertEquals($this->longtitude,$row['longtitude']);
        $this->assertEquals($this->available,$row['available']);
        $this->assertEquals($this->current,$row['current']);
    }

    public function test_update(){
        $place = new Place(null,"updateName","90.12345611","36.12121212","20","10");
        $place->setPID($place->getLastInserted()['PID']);
        $update = $place->updatePlace();
        $this->assertEquals("Success",$update);
        $row = $place->getLastInserted();
        $this->assertEquals("updateName",$row['namePlace']);
        $this->assertEquals("90.12345611",$row['latitude']);
        $this->assertEquals("36.12121212",$row['longtitude']);
        $this->assertEquals("20",$row['available']);
        $this->assertEquals("10",$row['current']);
    }
    public function test_viewAll(){
        $place = new Place(null,null,null,null,null,null);
        $result = $place->getAllPalce();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }
    public function test_delete(){
        $place = new Place(null,null,null,null,null,null);
        $place->setPID($place->getLastInserted()['PID']);
        $add = $place->deletePlace();
        $this->assertEquals("Success",$add);
    } 
} */