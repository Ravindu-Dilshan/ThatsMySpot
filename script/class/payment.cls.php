<?php
require_once('database.cls.php');


class Payment extends Database
{
	private  $PID;
	private  $amount;
	private  $UID;
	private  $status;

	public function __construct($PID,$amount,$UID,$status)
	{
		$this->PID = $PID;
		$this->amount = $amount;
		$this->UID = $UID;
		$this->status = $status;
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

	/**
	 * Get the value of status
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @return  self
	 */ 
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	public function getAllPayments()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT payment.*,user.nameUser,user.emailUser,user.telephoneUser,user.accessUser,
		parking_log.plate,parking_log.place,parking_log.in_time,parking_log.out_time 
		FROM `payment`,user,parking_log WHERE payment.PID = parking_log.PID AND user.UID=parking_log.UID";
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
		$connection = $this -> DBconnect();
		$sql = "SELECT payment.*,user.nameUser,user.emailUser,user.telephoneUser,user.accessUser,
		parking_log.plate,parking_log.place,parking_log.in_time,parking_log.out_time 
		FROM `payment`,user,parking_log WHERE payment.PID = parking_log.PID AND user.UID=parking_log.UID AND payment.UID = ? ORDER BY payment.status ASC";
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
/*
	public function addPlace()
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `parking_log`(`plate`, `place`, `in_time`, `out_time`, `amount`, `UID`) VALUES (?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssssss',$this ->plate,$this ->place, $this ->in ,$this ->out,$this ->amount,$this ->UID);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}
*/

	public function updatePayment()
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `payment` SET `status`= ? WHERE `PID`= ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $this ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$this ->status,$this ->PID);
			mysqli_stmt_execute($stmt);
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	public function getPaymentAmount()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT amount FROM payment WHERE `PID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->PID);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					return $row['amount'];
				}	
			}
			else{
			return false;
		    }
		}		
	}
//get count
	public function getUnpaidCount()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT COUNT(PID) AS `count` FROM payment WHERE UID = ?";
		$stmt = mysqli_stmt_init($connection);
		$result = mysqli_stmt_get_result($stmt);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				return $row['count'];
			}	
		}
		else{
			return $this ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

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