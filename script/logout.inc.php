<?php 
require_once('class/reservation.cls.php');
if(isset($_REQUEST['btnLogout']))
{
	$res = new Reservation();
	$res->dropTemp();
	session_start();
  	session_unset();
  	session_destroy();
    header('Location:../index.php');
    exit();
}
else{
	echo '<script>window.location = window.location+"?msg=errorLog"</script>';
	exit();
}

?>