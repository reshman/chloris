<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM members WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
First Name<br>
<input type="text" name="fname" value="<?php echo $row['fname']; ?>" /><br>
Last Name<br>
<input type="text" name="lname" value="<?php echo $row['lname']; ?>" /><br>
Age<br>
<input type="text" name="age" value="<?php echo $row['age']; ?>" /><br>
<input type="submit" value="Save" />
</form>
<?php
	}
?>