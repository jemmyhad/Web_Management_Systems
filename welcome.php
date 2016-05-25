<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["login"]["username"].value;
if (x==null || x=="")
  {
  alert("Username must be filled out");
  return false;
  }
var x=document.forms["login"]["password"].value;
if (x==null || x=="")
  {
  alert("Registration number must be filled out");
  return false;
  }
}
</script>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>South Eastern Kenya University - Online Virtual Classroom</title>

        

        <!-- Our CSS stylesheet file -->

        <link rel="stylesheet" href="student/styles.css" />

        
    </head>

    

<body>
<div id="header">
	<div id="headercontent">
		<a id="addq" href="index.php" title="click to the back link to enter home page" style="background-image:url('images/out.png'); background-repeat:no-repeat; padding: 6px 12px 12px; margin-right: 10px;"></a>
		SEKU- Online Virtual Classroom
	</div>
	<div id="headercontent1">
		SEKU- Online Virtual Classroom
	</div>
</div>
	<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
echo '<ul class="err">';
foreach($_SESSION['ERRMSG_ARR'] as $msg) {
echo '<li>',$msg,'</li>';
}
echo '</ul>';
unset($_SESSION['ERRMSG_ARR']);
}
?>
</div>


		
<div id="formContainer"> 
  <form id="login" name="login" method="post" action="login.php" style="height: 222px;" onsubmit="return validateForm()">
    <h1> 
      <div style="width: 190px; float:left;"> <strong>South Eastern Kenya University</strong> 
        <br>
        Login your account!</br> </div>
      <div class="clearfix"></div>
    </h1>
    <input type="text" name="username" id="loginEmail" placeholder="Username" style="width: 240px;" />
    <input type="password" name="password" id="loginPass" placeholder="Registration number" style="width: 240px;" />
    <input type="submit" id="buttonxxxx" name="submit" value="Login" />
  </form>
</div>

	<div id="footer">
		&copy; <?php echo date("Y"); ?> South Eastern Kenya University- Online Virtual Classroom. All rights reserved. Designed by <a href="#" target="_blank">Franklin Temba</a>
	</div>

    <!-- JavaScript includes -->

	<script src="jquery-1.7.1.min.js"></script>

		<script src="script.js"></script>


    

</body>

</html>



