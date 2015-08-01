<?php
require_once("dbcontroller.php");

$db_handle = new DBController();
if(!empty($_GET["id"])) {
	$result = mysql_query("DELETE FROM contacts WHERE id=".$_GET["id"]);
				echo "<script>alert('Contact Deleted!');</script>";
echo "<script>window.location='index.php'</script>";
}
?>
