<?php
session_start();
include "connect.php";
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pwd=$_POST['pass'];
	$pwd=md5($pwd);
	$q1="select password,id from login where email='$email'";
	$res=mysqli_query($con,$q1);
	$row=mysqli_fetch_assoc($res);
	$pwdcheck=$row['password'];
	if($pwd==$pwdcheck)
	{
		$_SESSION["id"]=$row['id'];
		//echo $_SESSION['id'];
		//print_r($_SESSION);
		header("location:loginsuccess.php");
	}
	else
	{
		header("location:homepage.php");
	}
}
?>