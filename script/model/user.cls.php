<?php
require_once('database.cls.php');
class User
{

	private  $UID;
	private  $nameUser;
	private  $emailUser;
	private  $passwordUser;
	private  $accessUser;
	private  $telephone;
	
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
	 * Get the value of nameUser
	 */ 
	public function getNameUser()
	{
		return $this->nameUser;
	}

	/**
	 * Set the value of nameUser
	 *
	 * @return  self
	 */ 
	public function setNameUser($nameUser)
	{
		$this->nameUser = $nameUser;

		return $this;
	}

	/**
	 * Get the value of emailUser
	 */ 
	public function getEmailUser()
	{
		return $this->emailUser;
	}

	/**
	 * Set the value of emailUser
	 *
	 * @return  self
	 */ 
	public function setEmailUser($emailUser)
	{
		$this->emailUser = $emailUser;

		return $this;
	}

	/**
	 * Get the value of passwordUser
	 */ 
	public function getPasswordUser()
	{
		return $this->passwordUser;
	}

	/**
	 * Set the value of passwordUser
	 *
	 * @return  self
	 */ 
	public function setPasswordUser($passwordUser)
	{
		$this->passwordUser = $passwordUser;

		return $this;
	}

	/**
	 * Get the value of telephone
	 */ 
	public function getTelephone()
	{
		return $this->telephone;
	}

	/**
	 * Set the value of telephone
	 *
	 * @return  self
	 */ 
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;

		return $this;
	}

	/**
	 * Get the value of accessUser
	 */ 
	public function getAccessUser()
	{
		return $this->accessUser;
	}

	/**
	 * Set the value of accessUser
	 *
	 * @return  self
	 */ 
	public function setAccessUser($accessUser)
	{
		$this->accessUser = $accessUser;

		return $this;
	}

	public function login()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM user WHERE (emailUser = ?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this->emailUser);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwCheck = password_verify($this->passwordUser,$row['passwordUser']);
				if ($pwCheck == true) {
					if (session_status() == PHP_SESSION_NONE) {
						session_start();
					}
					$user = array( 'UID' => $row['UID'],
					 'NAME' => $row['nameUser'],
					 'EMAIL' => $row['emailUser'],
					 'ACESS' => $row['accessUser']);
					$_SESSION['loggedUser'] = $user;
					//$_SESSION['TYPE'] = $row['accessUser'];
					return $db -> messages(1);
				}
				elseif ($pwCheck == false) {
					return $db -> messages(0);
				}
				else{
					return $db -> messages(-1);
				}
			}
			else{
				return $this->emailUser;//$db->messages(0);
			}
		}
		
	}

	protected function getUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM user WHERE  `UID` = ?";
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
		mysqli_stmt_close($stmt);
		
	}

	private function getUserByEmail()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM user WHERE  emailUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->emailUser);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if($result>0){
				return 1;
			}
			else{
				return 0;
			}
		}
		mysqli_stmt_close($stmt);
		
	}

	protected function getAllUsers()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM user";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	protected function addUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "INSERT INTO `user`(`nameUser`, `emailUser`, `passwordUser`, `telephoneUser`, `accessUser`) VALUES (?,?,?,?,?)";
		$stmt = mysqli_stmt_init($connection); 
		$check = $this->getUserByEmail();
		if($check==1){
			return $db -> messages(3);
		}
		elseif($check== -1){
			return $db -> messages(-1);
		}
		elseif(!mysqli_stmt_prepare($stmt,$sql)){
				return $db -> messages(-1);
		}
		else{
			$hashPass = password_hash($this ->passwordUser,PASSWORD_BCRYPT);
			//$type = 'user';
			mysqli_stmt_bind_param($stmt,'sssss',$this ->nameUser,$this ->emailUser, $hashPass ,$this ->telephone,$this ->accessUser);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	public function getLastInserted()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM `user` ORDER BY `UID` DESC LIMIT 1";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return mysqli_fetch_assoc($result);
		}
		else{
			return false;
		}
	}

	protected function updateUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`emailUser`=?,`telephoneUser`=?, accessUser=? WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		$check = $this->getUserByEmail();
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$this ->nameUser,$this ->emailUser ,$this ->telephone,$this ->accessUser,$this ->UID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	protected function deleteUser()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "DELETE FROM `user` WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->UID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	protected function getProfile()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT * FROM `user` WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
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

	protected function updateProfile()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`emailUser`=?,`telephoneUser`=? WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return $db ->messages(-1);
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$this ->nameUser,$this ->emailUser ,$this ->telephone,$this ->UID);
			mysqli_stmt_execute($stmt);
			return $db ->messages(1);
		}
		mysqli_stmt_close($stmt);
	}

	private function getPassword()
	{
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "SELECT `passwordUser` FROM user WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$this ->UID);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
					return $row['passwordUser'];
				}
			else{
			return false;
		    }
		}
		mysqli_stmt_close($stmt);
		
	}

	protected function changePw($nPw)
	{
		$pw= $this->getPassword();
		$db = Database::getInstance();
		$connection = $db->DBconnect();
		$sql = "UPDATE `user` SET `passwordUser`= ? WHERE `UID` = ?";
		$stmt = mysqli_stmt_init($connection);
		$pwCheck = password_verify($this ->passwordUser,$pw);
		if ($pwCheck == true) {
			$hashPass = password_hash($nPw,PASSWORD_BCRYPT);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return $db ->messages(-1);
			}
			else{
				mysqli_stmt_bind_param($stmt,'ss',$hashPass,$this ->UID);
				mysqli_stmt_execute($stmt);
				return $db ->messages(1);
			}
		}
		else{
			return $db ->messages(-2);
		}
		mysqli_stmt_close($stmt);
	}

	
}
 ?>