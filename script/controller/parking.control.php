<?php
require_once(dirname(__DIR__).'./model/parking.cls.php');
class ParkingLogController extends ParkingLog
{
    public function createParkingLog($plate,$place,$in,$out,$amount,$UID){
		$this->setPlate($plate);
		$this->setPlace($place);
		$this->setIn($in);
		$this->setOut($out);
		$this->setAmount($amount);
		$this->setUID($UID);
		return $this->addParkignLog();
	}
}
 ?>