<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Welcome to ChatBox</title>

<link rel="stylesheet" href="homepage.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
  <a href="bday.php" id="birthday">Birthday</a>
  <a href="secretchat.php" id="secret">Secret Chat</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Share Your Thoughts</h2>

  <div class="loginboxinner radius" id="co">

    <div class="loginheader">
	<?php
		$names=array_keys($_POST);
		if(count($names)==0){
			$fid=$_SESSION['rid'];
		}
		else
			$fid=$names[0];
		$q2="select fname,lname from about where id=$fid";
			$r2=mysqli_query($con,$q2);
			$fname=mysqli_fetch_assoc($r2);
			$lname=$fname['lname'];
			$fname=$fname['fname'];
		 $page = $_SERVER['PHP_SELF'];
		$sec = "30";
		header("Refresh: $sec; url=$page");
		//echo "Watch the page reload itself in 10 second!"
	?>
	<h3><?php echo $fname." ".$lname;?></h3>
	</div>
    <!--loginheader-->

    <div class="loginform" id="limitco">

      <?php
		//echo $id;
		//print_r($names);
		$q1="SELECT sid,chat,time from message where sid=$fid and rid=$id UNION SELECT sid,chat,time from message where sid=$id and rid=$fid order by time";
		//echo "hello";
		$r1=mysqli_query($con,$q1);
		//echo "hello";
		while($num=mysqli_fetch_assoc($r1)){
			$sid=$num['sid'];
			$q2="select image from about where id=$sid";
			$r2=mysqli_query($con,$q2);
			$avatar=mysqli_fetch_assoc($r2)['image'];
			$time=$num['time'];
			//print_r($time);
			$time=explode(" ",$time)[1];
			//print_r($time);
			$message=$num['chat'];
			if($sid==$fid){
				?>
				<div class="chat">
					<img src="<?php echo $avatar;?>" alt="Avatar" style="width:100%;">
					<p><?php echo $message;?></p>
					<span class="time-right"><?php echo $time;?></span>
				</div>
			<?php }
			else{
				?>
				<div class="chat darker">
					<img src="<?php echo $avatar;?>" alt="Avatar" style="width:100%;" class="right">
					<p><?php echo $message;?></p>
					<span class="time-left"><?php echo $time;?></span>
		 <p>
        <a href="del.php?msg='<?php echo $message;?>'">
          <span class="glyphicon glyphicon-trash time-left"></span>
        </a>
      </p> 
				</div>
			<?php
			}
		}
		$_SESSION['rid']=$fid;
			?>
	
    <!--loginform-->

  </div>
		<form action="message.php" method="post">
		 <p>

          <input style="width:350px" type="text" id="password" name="msg" placeholder="Type a message" class="radius" required/>

        <button type="submit" style="width:100px; height:43px">
          <span class="glyphicon glyphicon-send"></span>
        </button>
      </p> 
	  </form>
  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>