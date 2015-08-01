<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
	$result = mysql_query("UPDATE contacts set name = '".$_POST["name"]."', phone1 = '".$_POST["phone1"]."', phone2 = '".$_POST["phone2"]."', email = '".$_POST["email"]."', notes = '".$_POST["notes"]."' WHERE  id=".$_GET["id"]);
	if(!$result){
		$message = "Problem in Editing! Please Retry!";
	} else {
				echo "<script>alert('Contact Saved!');</script>";
				echo "<script>window.location='index.php'</script>";
	}
}
$result = $db_handle->runQuery("SELECT * FROM contacts WHERE id='" . $_GET["id"] . "'");
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
	if(!$("#phone1").val()) {
		$("#phone1-info").html("(required)");
		$("#phone1").css('background-color','#FFFFDF');
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
<input type="text" name="name" id="name" class="demoInputBox" value="<?php echo $result[0]["name"]; ?>">
</div>
<div>
<label>Phone1</label>
<span id="phone1-info" class="info"></span><br/>
<input type="text" name="phone1" id="phone1" class="demoInputBox" value="<?php echo $result[0]["phone1"]; ?>">
</div>
<div>
<label>Phone2</label> 
<span id="phone2-info" class="info"></span><br/>
<input type="text" name="phone2" id="phone2" class="demoInputBox" value="<?php echo $result[0]["phone2"]; ?>">
</div>
<div>
<label>Email</label> 
<span id="email-info" class="info"></span><br/>
<input type="text" name="email" id="email" class="demoInputBox" value="<?php echo $result[0]["email"]; ?>">
</div>
<div>
<label>Notes</label> 
<span id="notes-info" class="info"></span><br/>
<input type="text" name="notes" id="notes" class="demoInputBox" value="<?php echo $result[0]["notes"]; ?>">
</div>
<div>
<input type="submit" name="submit" id="btnAddAction" value="Save" />
</div>
</div>
