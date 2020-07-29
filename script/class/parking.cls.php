<?php
require_once('database.cls.php');

class ParkingLog
{
	private  $PID;
	private  $plate;
	private  $place;
	private  $in;
	private  $out;
	private  $amount;
	private  $UID;

	public function __construct($PID,$plate,$place,$in,$out,$amount,$UID)
	{
		$this->PID = $PID;
		$this->plate = $plate;
		$this->place = $place;
		$this->in = $in;
		$this->out = $out;
		$this->amount = $amount;
		$this->UID = $UID;
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
	 * Get the value of place
	 */ 
	public function getPlace()
	{
		return $this->place;
	}

	/**
	 * Set the value of place
	 *
	 * @return  self
	 */ 
	public function setPlace($place)
	{
		$this->place = $place;

		return $this;
	}

	/**
	 * Get the value of in
	 */ 
	public function getIn()
	{
		return $this->in;
	}

	/**
	 * Set the value of in
	 *
	 * @return  self
	 */ 
	public function setIn($in)
	{
		$this->in = $in;

		return $this;
	}

	/**
	 * Get the value of out
	 */ 
	public function getOut()
	{
			return $this->out;
	}

	/**
	 * Set the value of out
	 *
	 * @return  self
	 */ 
	public function setOut($out)
	{
			$this->out = $out;

			return $this;
	}

	/**
	 * Get the value of amount
	 */ 
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * Set the value of amount
	 *
	 * @return  self
	 */ 
	public function setAmount($amount)
	{
		$this->amount = $amount;

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

	public function getAllParking()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT parking_log.*,user.nameUser,user.telephoneUser,user.emailUser FROM `parking_log`,user WHERE parking_log.UID = user.UID";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function getAllParkingByDate($from,$to)
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT parking_log.*,user.nameUser,user.telephoneUser,user.emailUser FROM `parking_log`,user 
		WHERE parking_log.UID = user.UID AND (parking_log.in_time BETWEEN ? AND ?) ORDER BY parking_log.in_time ASC";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$from,$to);
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

	public function getAllByUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM parking_log WHERE `UID` = ?";
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
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "INSERT INTO `parking_log`(`plate`, `place`, `in_time`, `out_time`, `amount`, `UID`) VALUES (?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssssss',$this ->plate,$this ->place, $this ->in ,$this ->out,$this ->amount,$this ->UID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}
//reporting queries
	public function getAmountByMonth()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT MONTHNAME(out_time) as month, SUM(amount) as amount, COUNT(amount) as `count` 
		FROM parking_log WHERE YEAR(out_time)= YEAR(CURDATE()) GROUP BY MONTH(out_time)";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function getAmountByMonthLocation()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT MONTHNAME(out_time) as month, SUM(amount) as amount, COUNT(amount) as `count`, place 
		FROM parking_log WHERE YEAR(out_time)= YEAR(CURDATE()) AND place = ? GROUP BY MONTH(out_time), place";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->place);
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

	public function getCurrentMonthAmount()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT MONTHNAME(out_time) as month, SUM(amount) as amount FROM parking_log WHERE MONTH(out_time)= MONTH(CURDATE()) 
		AND YEAR(out_time)= YEAR(CURDATE()) GROUP BY MONTH(out_time) ";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				return $row['amount'];
			}	
		}
		else{
			return false;
		}	
	}

	public function getCurrentYearAmount()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT YEAR(out_time) year, SUM(amount) as amount FROM parking_log WHERE YEAR(out_time)= YEAR(CURDATE()) GROUP BY YEAR(out_time)";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				return $row['amount'];
			}
		}
		else{
			return false;
		    }	
	}


/*
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
*/
/*
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
*/

}
 ?>