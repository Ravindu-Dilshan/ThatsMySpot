<?php
require_once('database.cls.php');


class Vehicle
{
	private  $VID;
	private  $plate;
	private  $color;
	private  $type;
	private  $UID;

	public function __construct($VID,$plate,$color,$type,$UID)
	{
		$this->VID = $VID;
		$this->plate = $plate;
		$this->color = $color;
		$this->type = $type;
		$this->UID = $UID;
	}	
	/**
	 * Get the value of VID
	 */ 
	public function getVID()
	{
		return $this->VID;
	}

	/**
	 * Set the value of VID
	 *
	 * @return  self
	 */ 
	public function setVID($VID)
	{
		$this->VID = $VID;

		return $this;
	}

	/**
	 * Get the value of plate
	 */ 
	public function getPlate()
	{
		return $this->plate;
	}

	/**
	 * Set the value of plate
	 *
	 * @return  self
	 */ 
	public function setPlate($plate)
	{
		$this->plate = $plate;

		return $this;
	}

	/**
	 * Get the value of color
	 */ 
	public function getColor()
	{
		return $this->color;
	}

	/**
	 * Set the value of color
	 *
	 * @return  self
	 */ 
	public function setColor($color)
	{
		$this->color = $color;

		return $this;
	}

	/**
	 * Get the value of type
	 */ 
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 *
	 * @return  self
	 */ 
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of UID
	 */ 
	public function getUID()
	{
		return $this->UID;
	}

	/**
	 * Set the value of UID
	 *
	 * @return  self
	 */ 
	public function setUID($UID)
	{
		$this->UID = $UID;

		return $this;
	}

	public function getAllVehicles()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM vehicle";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}
	public function getAllByUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM vehicle WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->UID);
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

	public function getByID($id)
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM vehicle WHERE `VID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
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

	public function getVehicleByPlate()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM vehicle WHERE  plate = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->plate);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
			else{
				return false;
		    }
		}
		mysqli_stmt_close($stmt);
		
	}

	public function addVehicle()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "INSERT INTO `vehicle`(`plate`, `color`, `type`, `UID`) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		$check = $this->getVehicleByPlate();
		if($check==1){
			return $db -> messages(2);
		}
		elseif($check== -1){
			return $db -> messages(-1);
		}
		elseif(!mysqli_stmt_prepare($stmt,$sql)){
				return $db -> messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$this ->plate,$this ->color, $this ->type ,$this ->UID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}


	public function updateVehicel()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `vehicle` SET `plate`=?,`color`=?,`type`=?,`UID`=? WHERE `VID`=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$this ->plate,$this ->color, $this ->type ,$this ->UID,$this ->VID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	public function deleteVehicle()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "DELETE FROM `vehicle` WHERE VID = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->VID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}


	
}
 ?>