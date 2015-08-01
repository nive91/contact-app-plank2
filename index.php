<?php
		
	require_once("dbcontroller.php");
	
	if(!$_SESSION[logged]==true)
		echo "<script>window.location='login.php'</script>";
	$db_handle = new DBController();
	
	$search = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		
						$queryCondition .= " WHERE ";
						$search = $_POST["search"];
						$queryCondition .= "name LIKE '%" . $search . "%'";

	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM contacts " . $queryCondition;
	$href = 'index.php';					
		
	$query =  $sql . $orderby; 
	$result = $db_handle->runQuery($query);		
	$result  = mysql_query($sql);

?>

	<div style="text-align:right;margin:20px 0px 10px;">
	<a id="btnAddAction" href="add.php">Add New</a>
	<a id="btnAddAction" href="login.php?logout=true">Logout</a>
	</div>
<div id="contacts-grid">      
		<form name="frmSearch" method="post" action="index.php">
		<div class="search-box">
		<p><input type="text" placeholder="Search..." name="search" class="demoInputBox" value="<?php echo $search; ?>"	/>
			<input type="submit" name="go" class="btnSearch" value="Search"><input type="reset" class="btnSearch" value="Clear" onclick="window.location='index.php'"></p>
		</div>


			
			<table cellpadding="10" cellspacing="1">
        <thead>
					<tr>
          <th><strong>Name</strong></th>
          <th><strong>Phone1</strong></th>          
          <th><strong>Phone2</strong></th>
					<th><strong>Email</strong></th>
					<th><strong>Notes</strong></th>
					<th><strong>Action</strong></th>
					
					</tr>
				</thead>
				<tbody>
					<?php
					while($item = mysql_fetch_array($result))
					{
					?>
          <tr>
					<td><?php echo $item["name"]; ?></td>
          <td><?php echo $item["phone1"]; ?></td>
					<td><?php echo $item["phone2"]; ?></td>
					<td><?php echo $item["email"]; ?></td>
					<td><?php echo $item["notes"]; ?></td> 
					<td>
					<a class="btnEditAction" href="edit.php?id=<?php echo $item["id"]; ?>">Edit</a> <a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $item["id"]; ?>">Delete</a>
					</td>
					</tr>
					<?php
						}
					?>
				<tbody>
			</table>
			</form>	
		</div>
	</body>
</html>
