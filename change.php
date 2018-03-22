<?php
session_start();
include "connect.php";
if(isset($_POST['change']))
{
	$id=$_SESSION['id'];
	$opass=$_POST['opass'];
	$q3="select password from login where id=$id";
	$r3=mysqli_query($con,$q3);
	if($row=mysqli_fetch_assoc($r3))
	{
		$pass=$row['password'];
	}
	$opass=md5($opass);
	$npass=$_POST['npass'];
	$rpass=$_POST['rpass'];
	$npass=md5($npass);
	$rpass=md5($rpass);
	if(($npass==$rpass)&&($opass==$pass))
	{
		$q1="select * from login where id=$id";
		$r1=mysqli_query($con,$q1);
		while($row=mysqli_fetch_assoc($r1))
		{
			$q2="update login set password='$npass' where id=$id";
			$r2=mysqli_query($con,$q2);
			if($r2)
			{
				?>
				<html>
            	<body>
            	<script>
            	alert("Password changed successfully");
            	</script>
            	</body>
            	</html>
            	<?php
				header("Location:loginsuccess.php");
            }
            else
            {
             	?>
				<html>
            	<body>
            	<script>
            	alert("Password did not change!!!");
            	</script>
            	</body>
            	</html>
            	<?php
				header("Location:changepass.php");
            }
			}
		}
		else
		{
			?>
				<html>
            	<body>
            	<script>
            	alert("New Password & Re-Password do not match");
            	</script>
            	</body>
            	</html>
            	<?php
				header("Location:changepass.php");
		
		}
	
}


?>