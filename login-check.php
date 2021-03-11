<?php
require_once('config.php');
$var_username = $_POST['frm_username'];
$var_password = $_POST['frm_password'];
$sql_check="select * from user where 
			user_username='".$var_username."'";
$result = mysql_query($sql_check);
$getUser = mysql_num_rows($result);
$getDataUser = mysql_fetch_array($result);

if($getDataUser > 0){


if ($getUser === 1) 
{
	
	if (password_verify($var_password,$getDataUser['user_password']))
	{


    if($getDataUser["user_level"] == 'admin'){

		session_start();
		$_SESSION['username']=$getDataUser['user_username'];
		$_SESSION['password']=$getDataUser['user_password'];
		$_SESSION['level']=$getDataUser['user_level'];
		header('location: index.php?hal=dashboard');
        exit();

	}else if($getDataUser["user_level"] == 'kasir'){

		session_start();
		$_SESSION['username']=$getDataUser['user_username'];
		$_SESSION['password']=$getDataUser['user_password'];
		$_SESSION['level']=$getDataUser['user_level'];
		header('location: kasir/index.php?hal=dashboard');
        exit();
	}
		
	}
	else
	{
		header('location: login.php?action=failed');
	}	
	
}
else
{
	header('location: login.php?action=failed');
}
}
?>