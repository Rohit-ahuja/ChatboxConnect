<html>

<head>

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
  <a href="secretchat.php" id="secret">Secret Chat</a>
  <a href="homepage.php" id="logout">Logout</a>
</div>

<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Change Password</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">
      <h4 class="title">Make it more Secure!!</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

			<form id="login" method="post" action="">
		 <p>

          <input type="password" id="password" name="opass" placeholder="Enter Old Password" class="radius" required/>

        </p>

          <input type="password" id="password" name="spass" placeholder="Enter New Secret Password" class="radius" required/>

        </p>
		
        <p>

          <input type="password" id="repass" name="repass" placeholder="Re-enter Secret Password" class="radius" required/>

        </p>
		
        <p>

          <button class="radius title" name="reg">Change</button>

        </p>
			</form>
		<?php
		if(isset($_POST['reg'])){
		include "connect.php";
		$id=$_SESSION['id'];
		$opass=$_POST['opass'];
		$spass=$_POST['spass'];
		$repass=$_POST['repass'];
		$opass=md5($opass);
		$q1="select secretpass from about where id=$id";
		$r1=mysqli_query($con,$q1);
		$pass=mysqli_fetch_assoc($r1)['secretpass'];
		if($pass==$opass){
			if($spass==$repass){
				$spass=md5($spass);
				$q1="update about set secretpass='$spass' where id=$id";
				$r1=mysqli_query($con,$q1);
				header("location:secretchat.php");
			}
			else{
			header("location:cspass.php");
		}
		}
		else{
			header("location:cspass.php");
		}}
		?>
    <!--loginform-->

  </div>

  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>