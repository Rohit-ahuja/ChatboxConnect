<?php
$con=mysqli_connect('localhost','root','','messenger');
if($con){
	mysqli_select_db($con,"messenger");
}
else
	echo "NO conn";
?>