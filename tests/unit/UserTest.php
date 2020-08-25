<?php
/* session_start();
require_once(__DIR__.'/../../script/class/user.cls.php');
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $name = "testuser";
    private $email = "testuser@gmail.com";
    private $code = "testuserpassword";
    private $tele = "11245689";
    private $access = "Admin";
 
    public function test_register(){
        $user = new User(null,$this->name,$this->email,$this->code, $this->tele,$this->access);
        $add = $user->addUser();
        $this->assertEquals("Success",$add);
        $row = $user->getLastInserted();
        $this->assertEquals($this->name,$row['nameUser']);
        $this->assertEquals($this->email,$row['emailUser']);
        $this->assertEquals($this->tele,$row['telephoneUser']);
        $this->assertEquals($this->access,$row['accessUser']);
    }
    public function test_login(){
        $user = new User(null,null,$this->email,$this->code,null,null);
        $login = $user->login();
        $this->assertEquals("Success",$login);
    }
    public function test_update(){
        $user = new User(null,"updatedname","updatedEmail",null, "775212365","Manager");
        $user->setUID($user->getLastInserted()['UID']);
        $update = $user->updateUser();
        $this->assertEquals("Success",$update);
        $row = $user->getLastInserted();
        $this->assertEquals("updatedname",$row['nameUser']);
        $this->assertEquals("updatedEmail",$row['emailUser']);
        $this->assertEquals("775212365",$row['telephoneUser']);
        $this->assertEquals("Manager",$row['accessUser']);
    }
    public function test_view(){
        $user = new User(null,null,null,null,null,null);
        $user->setUID($user->getLastInserted()['UID']);
        $result = $user->getUser();
        $row = mysqli_fetch_assoc($result);
        $this->assertTrue($row>0);
        $this->assertEquals("updatedname",$row['nameUser']);
        $this->assertEquals("updatedEmail",$row['emailUser']);
        $this->assertEquals("775212365",$row['telephoneUser']);
        $this->assertEquals("Manager",$row['accessUser']);
    }
    public function test_viewAll(){
        $users = new User(null,null,null,null,null,null);
        $result = $users->getAllusers();
        $this->assertTrue(mysqli_fetch_assoc($result)>0);
    }
    public function test_delete(){
        $user = new User(null,null,null,null,null,null);
        $user->setUID($user->getLastInserted()['UID']);
        $add = $user->deleteUser();
        $this->assertEquals("Success",$add);
    }
} */