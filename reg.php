<?php
session_start();
include "connect.php";
if(isset($_POST['reg']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	echo $pwd;
	echo $repwd;
	if($pwd==$repwd)
	{
    $pwd=md5($pwd);
	$dob=$_POST['dob'];
	$image="images/image.jpg";
	$wallpaper="images/background.jpg";
	$q2="select count(*) from login";
	$r1=mysqli_query($con,$q2);
	$counter=mysqli_fetch_assoc($r1)['count(*)']+10000;
    $q1="insert into login values('$counter','$email','$pwd')";
	$res=mysqli_query($con,$q1);
	$q3="insert into about values('$counter','$fname','$lname','null','$image','$wallpaper','null','$dob')";
	$res=mysqli_query($con,$q3);
	if($res)
	   header("Location:homepage.php");
	else
	{
		echo("not registered");
	}
	//echo $pwd;
}
}
?>