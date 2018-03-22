<?php
session_start();
include "connect.php";
$names=array_keys($_POST);
$fid=$names[0];
$id=$_SESSION['id'];
//echo $id." friends with".$fid;
$q1="insert into friend values($id,$fid)";
$r1=mysqli_query($con,$q1);
header("location:loginsuccess.php");
?>