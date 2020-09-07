<?php
/*session_start();
require_once(__DIR__.'/../../script/controller/user.control.php');
require_once(__DIR__.'/../../script/view/user.view.php');
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private static $controller = null;
    private static $view = null;

    public function test_register(){
        $userController = $this::getController();
        $userView = $this::getView();
        $result = $userController->createUser("testuser", "testuser@gmail.com", "testuserpassword", "11245689", "Admin");
        $this->assertEquals("Success",$result);
        $row = $userView->lastRow();
        $this->assertEquals("testuser",$row['nameUser']);
        $this->assertEquals("testuser@gmail.com",$row['emailUser']);
        $this->assertEquals("11245689",$row['telephoneUser']);
        $this->assertEquals("Admin",$row['accessUser']);
    }
    public function test_login(){
        $userController = $this::getController();
        $result = $userController->loginUser("testuser@gmail.com","testuserpassword");
        $this->assertEquals("Success",$result);
    }
    public function test_update(){
        $userController = $this::getController();
        $userView = $this::getView();
        $row = $userView->lastRow();
        $UID = $row['UID'];
        $result = $userController->updateUserInfo($UID,"updatedname","updatedEmail@gmail.com","775212365","Manager");
        $row = $userView->lastRow();
        $this->assertEquals("Success",$result);
        $this->assertEquals("updatedname",$row['nameUser']);
        $this->assertEquals("updatedEmail@gmail.com",$row['emailUser']);
        $this->assertEquals("775212365",$row['telephoneUser']);
        $this->assertEquals("Manager",$row['accessUser']);
    }
    public function test_view(){
        $userView = $this::getView();
        $row = $userView->lastRow();
        $result = $userView->viewUser($row['UID']);
        $this->assertTrue(is_array($result));
        $this->assertEquals("updatedname",$result['nameUser']);
        $this->assertEquals("updatedEmail@gmail.com",$result['emailUser']);
        $this->assertEquals("775212365",$result['telephoneUser']);
        $this->assertEquals("Manager",$result['accessUser']);
    }
    public function test_updateProfile(){
        $userController = $this::getController();
        $userView = $this::getView();
        $row = $userView->lastRow();
        $UID = $row['UID'];
        $result = $userController->updateProfileInfo($UID,"updatedProfile","updatedEmail2@gmail.com","762201544");
        $row = $userView->lastRow();
        $this->assertEquals("Success",$result);
        $this->assertEquals("updatedProfile",$row['nameUser']);
        $this->assertEquals("updatedEmail2@gmail.com",$row['emailUser']);
        $this->assertEquals("762201544",$row['telephoneUser']);
    }
    public function test_changePW(){
        $userController = $this::getController();
        $userView = $this::getView();
        $row = $userView->lastRow();
        $UID = $row['UID'];
        $result = $userController->changePassword($UID,"testuserpassword","changepassword");
        $this->assertEquals("Success",$result);
    }
    public function test_viewAll(){
        $userView = $this::getView();
        $result = $userView->viewUsers();
        $this->assertFalse(is_null($result));
    }
    public function test_viewLog(){
        $userView = $this::getView();
        $result = $userView->viewUsersLog();
        $this->assertFalse(is_null($result));
    }
    public function test_delete(){
        $userController = $this::getController();
        $userView = $this::getView();
        $row = $userView->lastRow();
        $result = $userController->delete($row['UID']);
        $this->assertEquals("Success",$result);
    }

    public function test_getSet(){
        $u = $this::getView();
        $u->setUID("1");
        $this->assertEquals("1",$u->getUID());
        $u->setNameUser("test");
        $this->assertEquals("test",$u->getNameUser());
        $u->setEmailUser("test@gmail.com");
        $this->assertEquals("test@gmail.com",$u->getEmailUser());
        $u->setPasswordUser("test123");
        $this->assertEquals("test123",$u->getPasswordUser());
        $u->setTelephone("123456789");
        $this->assertEquals("123456789",$u->getTelephone());
        $u->setAccessUser("Customer");
        $this->assertEquals("Customer",$u->getAccessUser());
    }

    public static function getController()
	{
		if (self::$controller == null)
		{
		self::$controller = new UserController();
		}
		return self::$controller;
    }
    public static function getView()
	{
		if (self::$view == null)
		{
		self::$view = new UserView();
		}
		return self::$view;
	}
}*/