<?php
session_start();
include "connect.php";
$msg=$_GET['msg'];
$id=$_SESSION['id'];
$rid=$_SESSION['rid'];
echo $msg." ".$id." ".$rid;
$q1="delete from message where sid=$id and rid=$rid and chat=$msg";
$r1=mysqli_query($con,$q1);
header("location:chat.php");
?>