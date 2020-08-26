<?php
require_once('model/user.cls.php');
class UserController extends User
{
	public function createUser($nameUser, $emailUser, $passwordUser, $telephoneUser, $accessUser){
		$this->setNameUser($nameUser);
		$this->setEmailUser($nameUser);
		$this->setPasswordUser($nameUser);
		$this->setTelephone($nameUser);
		$this->setAccessUser($nameUser);
		return $this->addUser();
	}
	
	public function loginUser($emailUser, $passwordUser)
	{
		$this->setEmailUser($emailUser);
		$this->setPasswordUser($passwordUser);
		return $this->login();
	}
}
 ?>