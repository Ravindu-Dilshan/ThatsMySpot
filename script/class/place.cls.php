<?php
require_once('database.cls.php');


class Place extends Database
{
	private  $PID;
	private  $namePlace;
	private  $latitude;
	private  $longtitude;
	private  $available;
	private  $current;

	public function __construct($PID,$namePlace,$latitude,$longtitude,$available,$current)
	{
		$this->PID = $PID;
		$this->namePlace = $namePlace;
		$this->latitude = $latitude;
		$this->longtitude = $longtitude;
		$this->available = $available;
		$this->current = $current;
	}

	
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
	

	public function getAllPalce()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM place";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}
/*
	public function searchPlace($search)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM place WHERE namePack LIKE ? OR discription LIKE ? OR pricePack LIKE ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			$search = '%'.$search."%";
			mysqli_stmt_bind_param($stmt,'sss',$search,$search,$search);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
			else{
			return false;
		    }
		}
		
	}
*/
	public function addPlace()
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `place`(`namePlace`, `latitude`, `longtitude`, `available`, `current`) VALUES (?,?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$this ->namePlace,$this ->latitude, $this ->longtitude ,$this ->available,$this ->current);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}


	public function updatePlace()
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `place` SET `namePlace`=?,`latitude`=?,`longtitude`=?,`available`=?,`current`=? WHERE `PID`=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssssss',$this ->namePlace,$this ->latitude, $this ->longtitude ,$this ->available,$this ->current,$this ->PID);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	public function deletePlace()
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `place` WHERE PID = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->PID);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	public function updateCounter($task)
	{
		$connection = $this -> DBconnect();
		if($task == "out"){
			$sql = " CALL `decreaseCounter`(?)";
		}else{
			$sql = " CALL `increaseCounter`(?)";
		}
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->PID);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

}
 ?>