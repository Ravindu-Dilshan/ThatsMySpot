<?php
//session_start();
/* require_once(__DIR__.'/../../script/class/parking.cls.php');
use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase
{
    //give valid datafrom the database
	private  $place = "Maharagam";
    private  $from = "2020-08-26";
    private  $to = "2020-08-14";
	private  $UID = "1";

    public function test_viewAll(){
        $parking = new ParkingLog(null,null,null,null,null,null,null);
        $result = $parking->getAllParking();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }

    public function test_viewAllByMonth(){
        $parking = new ParkingLog(null,null,null,null,null,null,null);
        $result = $parking->getAmountByMonth();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }

    public function test_viewAllByMonthLocation(){
        $parking = new ParkingLog(null,null,$this->place,null,null,null,null);
        $result = $parking->getAmountByMonth();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }

    public function test_viewByDate(){
        $parking = new ParkingLog(null,null,null,null,null,null,null);
        //dates should be valid
        $result = $parking->getAllParkingByDate($this->from,$this->to);
        if($result!=false){
            $this->assertTrue(mysqli_fetch_assoc($result)>0);
        }else{
            $this->assertFalse($result);
        }
    }
    public function test_viewByUser(){
        $parking = new ParkingLog(null,null,null,null,null,null,$this->UID);
        //dates should be valid
        $result = $parking->getAllByUser();
        $row = mysqli_fetch_assoc($result);
        $this->assertTrue($row>0);
        $this->assertEquals($this->UID,$row['UID']);
    }

    public function test_incomeMonth(){
        $parking = new ParkingLog(null,null,$this->place,null,null,null,null);
        $result = $parking->getCurrentMonthAmount();
        $this->assertTrue($result!=0);
    }

    public function test_incomeYear(){
        $parking = new ParkingLog(null,null,$this->place,null,null,null,null);
        $result = $parking->getCurrentYearAmount();
        $this->assertTrue($result!=0);
    }
} */