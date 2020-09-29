<?php
/*This control all the location interactions*/
require_once(dirname(__DIR__).'./model/place.cls.php');
class PlaceController extends Place
{
	public function createPlace($namePlace,$latitude,$longtitude,$avaliable,$current){
		$this->setNamePlace($namePlace);
		$this->setLatitude($latitude);
		$this->setLongtitude($longtitude);
		$this->setAvailable($avaliable);
		$this->setCurrent($current);
		return $this->addPlace();
	}
	public function updatePlaceInfo($PID,$namePlace,$latitude,$longtitude,$avaliable,$current){
		$this->setPID($PID);
		$this->setNamePlace($namePlace);
		$this->setLatitude($latitude);
		$this->setLongtitude($longtitude);
		$this->setAvailable($avaliable);
		$this->setCurrent($current);
		return $this->updatePlace();
	}
	public function delete($PID){
		$this->setPID($PID);
		return $this->deletePlace();
	}
	public function updatePlaceCurrent($PID,$task){
		$this->setPID($PID);
		return $this->updateCounter($task);
	}
}
 ?>