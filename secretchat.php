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

<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Secret Chat</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">
	<?php 
		include "connect.php";
		$id=$_SESSION['id'];
		$q1="select secretpass from about where id=$id";
		$r1=mysqli_query($con,$q1);
		$pass=mysqli_fetch_assoc($r1)['secretpass'];
		if($pass=='null'){
		$h4="Share messages secretly";}
		else
		{
			$h4="Sh...Its secret";
		}
			?>

      <h4 class="title"><?php echo $h4;?></h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

      <?php
		if($pass=='null'){?>
			<form id="login" method="post" action="spassup.php">
		 <p>

          <input type="password" id="password" name="lpass" placeholder="Enter Login Password" class="radius" required/>

        </p>

          <input type="password" id="password" name="spass" placeholder="Enter New Secret Password" class="radius" required/>

        </p>
		
        <p>

          <input type="password" id="repass" name="repass" placeholder="Re-enter Secret Password" class="radius" required/>

        </p>
		
        <p>

          <button class="radius title" name="reg">Set Secret Password</button>

        </p>
			</form>
		<?php
		}
		else
		{
			?>
				<form id="login" method="post" action="slogin.php">

          <input type="password" id="password" name="spass" placeholder="Enter Secret Password" class="radius" required/>

        </p>
		
        <p>

          <button class="radius title" name="reg">Share Secrets..</button>

        </p>
			</form>
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