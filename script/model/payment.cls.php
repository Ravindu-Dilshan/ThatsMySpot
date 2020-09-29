<?php
require_once('database.cls.php');
class Payment
{
	private  $PID;
	private  $amount;
	private  $UID;
	private  $status;	

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

	protected function getAllPayments()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
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

	protected function getAllSettlePayments()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT payment.amount,payment.UID,user.emailUser,
		settlement.date,parking_log.place,settlement.txn,settlement.merID,settlement.PID
		FROM `payment`,user,parking_log,settlement WHERE payment.PID = parking_log.PID AND user.UID=parking_log.UID AND payment.PID=settlement.PID";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}


	protected function getAllByUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
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
	//after payment insert the settlement
	public function addSettlement($txn,$merID,$date)
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "INSERT INTO `settlement`(`PID`, `txn`, `merID`,`date`) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$this ->PID,$txn,$merID,$date);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	protected function updatePayment()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `payment` SET `status`= ? WHERE `PID`= ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$this ->status,$this ->PID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	protected function getPaymentAmount()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT amount FROM payment WHERE `PID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
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
	//get count of the unpaid payments
	protected function getUnpaidCount()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT COUNT(PID) AS `count` FROM payment WHERE UID = ? and `status`= 'Not Paid'";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->UID);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					return $row['count'];
				}	
			}
			else{
			return false;
		    }
		}	
		mysqli_stmt_close($stmt);
	}
}
 ?>