<?php
require_once('database.cls.php');


class Place
{
	private  $PID;
	private  $namePlace;
	private  $latitude;
	private  $longtitude;
	private  $available;
	private  $current;
	
	/**
	 * Get the value of PID
	 */ 
	public function getPID()
	{
		return $this->PID;
	}

	/**
	 * Set the value of PID
	 *
	 * @return  self
	 */ 
	public function setPID($PID)
	{
		$this->PID = $PID;

		return $this;
	}

	/**
	 * Get the value of namePlace
	 */ 
	public function getNamePlace()
	{
		return $this->namePlace;
	}

	/**
	 * Set the value of namePlace
	 *
	 * @return  self
	 */ 
	public function setNamePlace($namePlace)
	{
		$this->namePlace = $namePlace;

		return $this;
	}

	/**
	 * Get the value of latitude
	 */ 
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Set the value of latitude
	 *
	 * @return  self
	 */ 
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;

		return $this;
	}

	/**
	 * Get the value of longtitude
	 */ 
	public function getLongtitude()
	{
		return $this->longtitude;
	}

	/**
	 * Set the value of longtitude
	 *
	 * @return  self
	 */ 
	public function setLongtitude($longtitude)
	{
		$this->longtitude = $longtitude;

		return $this;
	}

	/**
	 * Get the value of available
	 */ 
	public function getAvailable()
	{
		return $this->available;
	}

	/**
	 * Set the value of available
	 *
	 * @return  self
	 */ 
	public function setAvailable($available)
	{
		$this->available = $available;

		return $this;
	}

	/**
	 * Get the value of current
	 */ 
	public function getCurrent()
	{
		return $this->current;
	}

	/**
	 * Set the value of current
	 *
	 * @return  self
	 */ 
	public function setCurrent($current)
	{
		$this->current = $current;

		return $this;
	}
	

	protected function getAllPalce()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM place";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}
	protected function getLastInserted()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM `place` ORDER BY `PID` DESC LIMIT 1";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return mysqli_fetch_assoc($result);
		}
		else{
			return false;
		}
	}
	
	protected function addPlace()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "INSERT INTO `place`(`namePlace`, `latitude`, `longtitude`, `available`, `current`) VALUES (?,?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$this ->namePlace,$this ->latitude, $this ->longtitude ,$this ->available,$this ->current);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}


	protected function updatePlace()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `place` SET `namePlace`=?,`latitude`=?,`longtitude`=?,`available`=?,`current`=? WHERE `PID`=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssssss',$this ->namePlace,$this ->latitude, $this ->longtitude ,$this ->available,$this ->current,$this ->PID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	protected function deletePlace()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "DELETE FROM `place` WHERE PID = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->PID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}
	//increase decrease availability
	protected function updateCounter($task)
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		if($task == "out"){
			$sql = " CALL `decreaseCounter`(?)";
		}else{
			$sql = " CALL `increaseCounter`(?)";
		}
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->PID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

}
 ?>