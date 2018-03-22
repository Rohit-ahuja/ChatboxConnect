<?php
	session_start();
	include "connect.php";
	$id=$_SESSION['id'];
	$q1="select secretpass from about where id=$id";
	$r1=mysqli_query($con,$q1);
	$pass=mysqli_fetch_assoc($r1)['secretpass'];
	$spass=$_POST['spass'];
	$spass=md5($spass);
	if($pass==$spass){
		header("location:sloginsuccess.php");
	}
	else
		header("location:secretchat.php");
?>