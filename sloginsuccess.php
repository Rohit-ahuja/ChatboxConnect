<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Welcome to ChatBox</title>

<link rel="stylesheet" href="homepage.css" type="text/css" />

</head>
<?php
		session_start();
		include "connect.php";
		$id=$_SESSION['id'];
		$q1="select wallpaper from about where id=$id";
	    $r1=mysqli_query($con,$q1);
		$wallpaper=mysqli_fetch_assoc($r1)['wallpaper'];?>
		
<body class="login" style="background-image:url('<?php echo $wallpaper;?>')" id="bg">

<!-- header starts here -->

<div id="facebook-Bar">

  <div id="facebook-Frame">

    <div id="logo"> <a href="loginsuccess.php">ChatBoxConnect</a> 
	</div>

  </div>

</div>

<!-- header ends here -->
<div id="mySidenav" class="sidenav">
  <a href="about.php" id="about">About</a>
  <a href="bday.php" id="birthday">Birthday</a>
  <a href="cspass.php" id="secret">Change Pass</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

<div class="loginbox radius" id="limit">

  <h2 style="color:#141823; text-align:center;">Your Friend List</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">Your special friend</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

      <?php
		//echo $id;
		$q1="select count(*) from friend where f1id=$id";
		//echo "hello";
		$r1=mysqli_query($con,$q1);
		//echo "hello";
		$f_num=mysqli_fetch_assoc($r1)['count(*)'];
		if($f_num==0){
			?>
			<h3>No friends to show!!</h3>
			<?php
		}
		else
		{
			$q1="select f2id from friend where f1id=$id";
			$r1=mysqli_query($con,$q1);
			while($row=mysqli_fetch_assoc($r1))
			{
				$fid=$row['f2id'];
				$q3="select fname,lname,image from about where id=$fid";
				$r2=mysqli_query($con,$q3);
				$row1=mysqli_fetch_assoc($r2);
				$q4="select email from login where id=$fid";
				$r3=mysqli_query($con,$q4);
				$row2=mysqli_fetch_assoc($r3);?>
				
				<div class="container">
				<img id="zoom" src="<?php echo $row1['image'];?>" alt="Avatar" style="width:90px">
				<p><span><?php echo $row1['fname']." ".$row1['lname'];?> </span></p>
				<p><?php echo $row2['email'];?></p>
				<form method="post" action="schat.php">
				<button type="submit" class="radius title" name="<?php echo $fid;?>" style="width:100px;">Chat</button></form>
				</div>
			<?php
			}
		}
		?>
		
    <!--loginform-->

  </div>

  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>