<?php
session_start();
include "connect.php";
$sid=$_SESSION['id'];
$rid=$_SESSION['rid'];
$chat=$_POST['msg'];
//echo $sid." ".$rid." ".$chat;
date_default_timezone_set("Asia/Kolkata");
$created_date = date("Y-m-d H:i:s");

$q1="insert into message values($sid,$rid,'$chat','$created_date')";
$r2=mysqli_query($con,$q1);
header("location:chat.php");
?>