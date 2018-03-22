<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Welcome to ChatBox</title>

<link rel="stylesheet" href="homepage.css" type="text/css" />

</head>

<body class="login" style="background-image:url('images/background.jpg')">

<!-- header starts here -->

<div id="facebook-Bar">

  <div id="facebook-Frame">

    <div id="logo"> <a href="homepage.html">ChatBoxConnect</a> 
	</div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
        <form action="search.php">
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

  <h2 style="color:#141823; text-align:center;">Password</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">Make yourself secure.</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

      <form id="login" action="change.php" method="post">
        <p>

          <input type="password" id="oldpass" name="opass" placeholder="Old Password" value="" class="radius mini" />
		</p>
		<p>
          <input type="password" id="newpass" name="npass" placeholder="New Password" value="" class="radius mini" />

        </p>

        <p>

          <input type="password" id="repass" name="rpass" placeholder="Re Password" value="" class="radius mini" />

        </p>
		
		<p>
          <button class="radius title" name="change">Change</button>
        </p>

      </form>

    </div>
	
    <!--loginform-->

  </div>

  <!--loginboxinner-->
</div>

<!--loginbox-->
</body>
</html>
