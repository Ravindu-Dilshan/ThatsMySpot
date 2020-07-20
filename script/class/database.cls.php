<?php
class Database
{
	protected function DBconnect()
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

	protected function messages($i)
	{
		switch ($i) {
			case 1:
				return 'Success';
			  	break;
			case 2:
				return 'Success2';
				break;
			case 3:
				return 'Success3';
				break;
			case 0:
				return 'Incorrect Username or Password';
				break;
			case -1:
				return 'Something Went Wrong';
				break;
			default:
				return 'Nothing';
		  } 
	}

}

?>