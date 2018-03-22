<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <a href="changepass.php" id="about">Change Pass</a>
  <a href="bday.php" id="birthday">Birthday</a>
  <a href="secretchat.php" id="secret">Secret Chat</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

      <?php
		//echo $id;
		$q1="select fname,lname,dob,gender,image from about where id=$id";
		//echo "hello";
		$r1=mysqli_query($con,$q1);
		//echo "hello";
		$f_num=mysqli_fetch_assoc($r1);
		$gender=$f_num['gender'];
		$name=$f_num['fname']." ".$f_num['lname'];
		$dob=$f_num['dob'];
		$image=$f_num['image'];
		$q1="select email from login where id=$id";
		//echo "hello";
		$r1=mysqli_query($con,$q1);
		//echo "hello";
		$email=mysqli_fetch_assoc($r1)['email'];
		if($gender=='null'){
			?>
			<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Gender</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">About what u feel proud</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

			<br/><br/><br/>
			<a href="gen.php?gender='male' "style="font-size:72px;"><i class="fa fa-mars"></i></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="gen.php?gender='female'" style="font-size:72px;"><i class="fa fa-venus"></i></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="gen.php?gender='transgender'" style="font-size:72px;"><i class="fa fa-transgender"></i></a>
		<?php
		}
		else{?>
		
				<!--<div class="loginbox radius">-->
<br/><br/><br/>
  <!--<div class="loginboxinner radius" style="width=100px">-->
<div class="card" style="color:#141823;">
  <a href="dp.php"><img src="<?php echo $image;?>" alt="avatar" style="width:100%"></a><br/>
  <h1><?php echo $name;?></h1><br/>
  <p class="title"><?php echo $email;?></p>
  <br/>
  <p><?php echo $dob."  ||   ".$gender;?></p>
  <br/>
</div>
<br/><br/>
<!--</div></div>-->
<?php
		}?>
		
    <!--loginform-->

  </div>

  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>