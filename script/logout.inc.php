<?php 
if(isset($_REQUEST['btnLogout']))
{
	session_start();
  	session_unset();
  	session_destroy();
    header('Location:../login.php');
    exit();
}
if(isset($_REQUEST['btnLogoutCustomer']))
{
	session_start();
  	session_unset();
  	session_destroy();
    header('Location:../userapp/login.php');
    exit();
}
else{
	echo '<script>window.location = window.location+"?msg=errorLog"</script>';
	exit();
}

?>