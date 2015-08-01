<?php
require_once("dbcontroller.php");

	if($_GET["logout"]==true)
		{
		session_destroy();
		echo "<script>alert('Logged Out Successfully!'); window.location.href='login.php';</script>";
		}

if(!empty($_POST["name"]) && !empty($_POST["pass"]))
	if($_POST["name"]=="admin" && $_POST["pass"]=="1234")
		{
			$_SESSION[logged]=true;
			echo "<script>window.location='index.php'</script>";
		}
?>

<script>
function validate() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#name").val()) {
		$("#name-info").html("(required)");
		$("#name").css('background-color','#FFFFDF');
		valid = false;
	}
	
	if(!$("#pass").val()) {
		$("#pass-info").html("(required)");
		$("#pass").css('background-color','#FFFFDF');
		valid = false;
	}
		
	return valid;
}
</script>

<form name="frmLogin" method="post" action="" id="frmLogin" onClick="return validate();">
<div id="mail-status"></div>
<div>
<label style="posting-top:20px;">User Name</label>
<span id="name-info" class="info"></span><br/>
<input type="text" name="name" id="name" class="demoInputBox">
</div>
<div>
<label>Password</label>
<span id="pass-info" class="info"></span><br/>
<input type="password" name="pass" id="pass" class="demoInputBox">
</div>

<div>
<input type="submit" name="submit" id="btnAddAction" value="Login" />
</div>
</div>
