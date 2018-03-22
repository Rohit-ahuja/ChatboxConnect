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

    <div id="logo"> <a href="homepage.php">ChatBoxConnect</a> </div>

    <div id="header-main-right">

      <div id="header-main-right-nav">

        <form method="post" action="login.php" id="login_form" name="login_form">

          <table border="0" style="border:none">

            <tr>

              <td ><input type="text" tabindex="1"  id="email" placeholder="Email" name="email" class="inputtext radius1" value=""></td>

              <td ><input type="password" tabindex="2" id="pass" placeholder="Password" name="pass" class="inputtext radius1" ></td>

              <td ><input type="submit" class="fbbutton" name="login" value="Login" /></td>

            </tr>

            <tr>

              <td><label>

                  <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>

                  <span style="color:#ccc;">Keep me logged in</span></label></td>

              <td><label><a href="" style="color:#ccc; text-decoration:none">forgot your password?</a></label></td>

            </tr>

          </table>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- header ends here -->

<div class="loginbox radius">

  <h2 style="color:#141823; text-align:center;">Welcome to ChatBox</h2>

  <div class="loginboxinner radius">

    <div class="loginheader">

      <h4 class="title">Connect with friends and the world around you.</h4>

    </div>

    <!--loginheader-->

    <div class="loginform">

      <form id="login" action="reg.php" method="post">

        <p>

          <input type="text" id="firstname" name="fname" placeholder="First Name" value="" class="radius mini" required/>

          <input type="text" id="lastname" name="lname" placeholder="Last Name" value="" class="radius mini" required/>

        </p>

        <p>

          <input type="text" id="email" name="email" placeholder="Your Email" value="" class="radius" required/>

        </p>
		
		 <p>

          <input type="password" id="password" name="pwd" placeholder="New Password" class="radius" required/>

        </p>
		
        <p>

          <input type="password" id="repass" name="repwd" placeholder="Re-enter Password" class="radius" required/>

        </p>
		
        <p>

          <input type="date" id="dob" name="dob" placeholder="Date Of Birth" class="radius" required/>

        </p>
       

        <p>

          <button class="radius title" name="reg">Sign Up for ChatBox</button>

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
<?php
//session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

//echo "All session variables are now removed, and the session is destroyed." 
?>