<?php
/*This control all the vehicle interactions*/
require_once(dirname(__DIR__).'/model/vehicle.cls.php');
class VehicleController extends Vehicle
{
	public function createVehicle($plate,$color,$type, $UID){
		$this->setPlate($plate);
		$this->setColor($color);
		$this->setType($type);
		$this->setUID($UID);
		return $this->addVehicle();
	}
	public function updateVehicleInfo($VID,$plate,$color,$type, $UID){
		$this->setVID($VID);
		$this->setPlate($plate);
		$this->setColor($color);
		$this->setType($type);
		$this->setUID($UID);
		return $this->updateVehicel();
	}
	public function delete($VID){
		$this->setVID($VID);
		return $this->deleteVehicle();
	}
	
}
 ?>