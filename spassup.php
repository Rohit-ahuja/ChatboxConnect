<?php
session_start();
include "connect.php";
$id=$_SESSION['id'];
$lpass=$_POST['lpass'];
$spass=$_POST['spass'];
$repass=$_POST['repass'];
$lpass=md5($lpass);
$q1="select password from login where id=$id";
$r1=mysqli_query($con,$q1);
$pass=mysqli_fetch_assoc($r1)['password'];
if($pass==$lpass){
	if($spass==$repass){
		$spass=md5($spass);
		$q1="update about set secretpass='$spass' where id=$id";
		$r1=mysqli_query($con,$q1);
	}
}
header("location:secretchat.php");
?>