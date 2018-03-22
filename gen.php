<?php
session_start();
include "connect.php";
$gen=$_GET['gender'];
$id=$_SESSION['id'];
$q1="update about set gender=$gen where id=$id";
$r1=mysqli_query($con,$q1);
header("location:about.php");
?>