<?php
require_once(dirname(__DIR__).'./model/user.cls.php');
class UserController extends User
{
	public function createUser($nameUser, $emailUser, $passwordUser, $telephoneUser, $accessUser){
		$this->setNameUser($nameUser);
		$this->setEmailUser($emailUser);
		$this->setPasswordUser($passwordUser);
		$this->setTelephone($telephoneUser);
		$this->setAccessUser($accessUser);
		return $this->addUser();
	}
	public function loginUser($emailUser, $passwordUser)
	{
		$this->setEmailUser($emailUser);
		$this->setPasswordUser($passwordUser);
		return $this->login();
	}
	public function updateUserInfo($UID,$nameUser, $emailUser,$telephoneUser, $accessUser){
		$this->setUID($UID);
		$this->setNameUser($nameUser);
		$this->setEmailUser($emailUser);
		$this->setTelephone($telephoneUser);
		$this->setAccessUser($accessUser);
		return $this->updateUser();
	}
	public function delete($UID){
		$this->setUID($UID);
		return $this->deleteUser();
	}
	public function updateProfileInfo($UID,$nameUser, $emailUser,$telephoneUser){
		$this->setUID($UID);
		$this->setNameUser($nameUser);
		$this->setEmailUser($emailUser);
		$this->setTelephone($telephoneUser);
		return $this->updateProfile();
	}
	public function changePassword($UID,$passwordUser,$nPW){
		$this->setUID($UID);
		$this->setPasswordUser($passwordUser);
		return $this->changePw($nPW);
	}
}
 ?>