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
    <div id="header-main-right">
      <div id="header-main-right-nav">
        <form action="search.php" method="post">
           <input type="text" id="search" name="search" placeholder="Search...">
        </form>
      </div>

    </div>

  </div>

</div>

<!-- header ends here -->
<div id="mySidenav" class="sidenav">
  <a href="about.php" id="about">About</a>
  <a href="coming.php" id="birthday">Upcoming B'day</a>
  <a href="secretchat.php" id="secret">Secret Chat</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Today's Bday</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">Make their day special!!</h4>

    </div>

    <!--loginheader-->

    <div class="loginform" id="limit">

      <?php
		$flag=0;
		//echo $id;
		$q1="select f2id from friend where f1id=$id";
		//echo "hello";
		$r1=mysqli_query($con,$q1);
		//echo "hello";
		date_default_timezone_set("Asia/Kolkata");
		$created_date = date("d-m");
		while($f_num=mysqli_fetch_assoc($r1)){
			$fid=$f_num['f2id'];
			$q2="select dob from about where id=$fid";
			$r2=mysqli_query($con,$q2);
			$dob=mysqli_fetch_assoc($r2)['dob'];
			$newDate = date("d-m-Y", strtotime($dob));
			$newDate=explode("-",$newDate);
			$newDate=$newDate[0]."-".$newDate[1];
			if($newDate==$created_date){
				$flag=1;
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
				<form method="post" action="chat.php">
				<button type="submit" class="radius title" name="<?php echo $fid;?>" style="width:200px;">Send Wishes</button></form>
				</div>
			<?php
			}
			
		}
		if($flag==0){
			?>
			<h3>No B'day today..Check the upcoming ones!!</h3>
		<?php
		}
			?>
		
    <!--loginform-->

  </div>

  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>