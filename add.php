<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
	$result = mysql_query("INSERT INTO contacts(name, phone1, phone2, email, notes) VALUES('".$_POST["name"]."','".$_POST["phone1"]."','".$_POST["phone2"]."','".$_POST["email"]."','".$_POST["notes"]."')");
	if(!$result){
			$message="Problem in Adding to database. Please Retry.";
	} else {
		echo "<script>alert('Contact Saved!');</script>";
echo "<script>window.location='index.php'</script>";
	}
}
?>
<html>
<body>
<p><a href="index.php">Back</a></p>
</body>
</html>
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
		
	return valid;
}
</script>
<form name="frmContact" method="post" action="" id="frmContact" onClick="return validate();">
<div id="mail-status"></div>
<div>
<label style="padding-top:20px;">Name</label>
<span id="name-info" class="info"></span><br/>
<input type="text" name="name" id="name" class="demoInputBox">
</div>
<div>
<label>Phone1</label>
<span id="phone1-info" class="info"></span><br/>
<input type="text" name="phone1" id="phone1" class="demoInputBox">
</div>
<div>
<label>Phone2</label> 
<span id="phone2-info" class="info"></span><br/>
<input type="text" name="phone2" id="phone2" class="demoInputBox">
</div>
<div>
<label>Email</label> 
<span id="email-info" class="info"></span><br/>
<input type="text" name="email" id="email" class="demoInputBox">
</div>
<div>
<label>Notes</label> 
<span id="notes-info" class="info"></span><br/>
<input type="text" name="notes" id="notes" class="demoInputBox">
</div>
<div>
<input type="submit" name="submit" id="btnAddAction" value="Add" />
</div>
</div>
