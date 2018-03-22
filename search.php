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
  <a href="bday.php" id="birthday">Birthday</a>
  <a href="secretchat.php" id="secret">Secret Chat</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

<div class="loginbox radius" id="limit">

  <h2 style="color:#141823; text-align:center;">Your might know them</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">Socialize With ChatBox</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

      <?php
		$name=$_POST['search'];
		$name_exp=explode(' ',$name);
		//echo count($name_exp);
		$fname=$name_exp[0];
		if(count($name_exp)==2)
		   $lname=$name_exp[1];
	    else
			$lname='';
		$q5="select id,image,fname,lname from about where fname='$fname' or fname='$lname' or lname='$fname' or lname='$lname'";
		$r1=mysqli_query($con,$q5);
		$cnt=0;
		while($row1=mysqli_fetch_assoc($r1))
		{
			$cnt=1;
			$seid=$row1['id'];
			if($seid!=$id){
			$q10="select email from login where id=$seid";
			$r3=mysqli_query($con,$q10);
			$row2=mysqli_fetch_assoc($r3);
			$q11="select count(*) from friend where f1id=$id and f2id=$seid";
			$r4=mysqli_query($con,$q11);
			$row3=mysqli_fetch_assoc($r4);
			if($row3['count(*)']==0){
				$button="Add";
				$next_loc="add.php";
				//echo $next_loc;
			}
			else{
				$button="Chat";
			$next_loc="chat.php";}
			?>
			<div class="container">
				<img id="zoom" src="<?php echo $row1['image'];?>" alt="Avatar" style="width:90px">
				<p><span><?php echo $row1['fname']." ".$row1['lname'];?> </span></p>
				<p><?php echo $row2['email'];?></p>
				<form method="post" action="<?php echo $next_loc?>">
				<button type="submit" class="radius title" name="<?php echo $seid;?>" style="width:100px;"><?php echo $button;?></button></form>
				</div>
			<?php
			}
		}
		if($cnt==0)
		{?>
			<h3>No such friend found!!</h3>
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