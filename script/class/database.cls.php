<?php
class Database
{
	private static $instance = null;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (self::$instance == null)
		{
		self::$instance = new Database();
		}
		return self::$instance;
	}

	public function DBconnect()
	{
		$server = "localhost";
		$user = "root";
		$password = "";
		$database = "thats_my_spot";
		$connection = mysqli_connect($server,$user,$password,$database);
		if(!$connection){
			echo '<h4>Connection error</h4>'.$connection->connect_error;
		}
		return $connection;
	}

	public function messages($i)
	{
		switch ($i) {
			case 1:
				return 'Success';
			  	break;
			case 2:
				return 'Vehicel Already Registered';
				break;
			case 3:
				return 'Email in Use';
				break;
			case 0:
				return 'Incorrect Username or Password';
				break;
			case -1:
				return 'Something Went Wrong';
				break;
			case -2:
				return 'Incorrect Password';
				break;
			default:
				return 'Nothing';
		  } 
	}

}

?>