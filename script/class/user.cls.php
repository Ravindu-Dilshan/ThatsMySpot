<?php
require_once('database.cls.php');
class User extends Database
{

	private  $UID;
	private  $nameUser;
	private  $emailUser;
	private  $passwordUser;
	private  $accessUser;

	public function __construct($UID,$nameUser,$emailUser,$passwordUser,$accessUser)
	{
		$this->UID = $UID;
		$this->nameUser = $nameUser;
		$this->emailUser = $emailUser;
		$this->passwordUser = $passwordUser;
		$this->accessUser = $accessUser;
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
	 * Get the value of emaiUser
	 */ 
	public function getEmailUser()
	{
		return $this->emaiUser;
	}

	/**
	 * Set the value of emaiUser
	 *
	 * @return  self
	 */ 
	public function setEmailUser($emaiUser)
	{
		$this->emaiUser = $emaiUser;

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
		$connection = $this -> DBconnect();
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
					//session_start();
					//$_SESSION['ID'] = $row['idUser'];
					//$_SESSION['TYPE'] = $row['type'];
					return $this -> messages(1);
				}
				elseif ($pwCheck == false) {
					return $this -> messages(3);
				}
				else{
					return $this -> messages(-1);
				}
			}
			else{
				return $this->messages(0);
			}
		}
		
	}

	private function getUserByName($user,$email)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user WHERE nameUser = ? OR email = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$user,$email);
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

	public function getAllUsers()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function addUser()
	{
		$connection = $this -> DBconnect();
		$user = $this -> User();
		$sql = "INSERT INTO `user`(`nameUser`, `emailUser`, `passwordUser`, `accessUser`) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
		}
		else{
			$hashPass = password_hash($this ->passwordUser,PASSWORD_BCRYPT);
			$type = 'user';
			mysqli_stmt_bind_param($stmt,'sssss',$this ->nameUser,$this ->emailUser,$this ->passwodUser,$this ->accessUser);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}


	public function updateUser($id,$name,$address,$email,$type)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`email`=?,`address`=?, type=? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$name,$email,$address,$type,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function deleteUser($id)
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `user` WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function getProfile($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
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

	public function updateProfile($id,$name,$address,$email)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`email`=?,`address`=? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$name,$email,$address,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	private function getPassword($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT password FROM user WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				echo '<script>alert('.$row['password'].');</script>';
				return $row['password'];
				}
			else{
			return false;
		    }
		}
		mysqli_stmt_close($stmt);
		
	}

	public function changePw($id,$oPw,$nPw)
	{
		$pw= $this->getPassword($id);
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `password`= ? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		$pwCheck = password_verify($oPw,$pw);
		echo '<script>alert('.$pw.');</script>';
		if ($pwCheck == true) {
			$hashPass = password_hash($nPw,PASSWORD_BCRYPT);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				mysqli_stmt_bind_param($stmt,'ss',$hashPass,$id);
				mysqli_stmt_execute($stmt);
				return 1;
			}
		}
		else{
			return 2;
		}
		mysqli_stmt_close($stmt);
	}
	
}
 ?>