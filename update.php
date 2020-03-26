<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
</head>
<body>
<?php
include 'Connection.php';
$db = new Connection();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$getContact = $db->getContact($_GET['id']);
}

if(isset($_POST['submit'])){
	$db->editContact($_POST['username'],$_POST['phone'],$_POST['address'],$id);
	header("location: index.php");
}
?>
<?php
	foreach($getContact as $data){

?>
	<form method="POST" action="" style="border: 2px solid blue; padding: 15px;">
		<input type="text" name="username" placeholder="Username" value="<?php echo $data['username']; ?>"><br>
		<input type="text" name="phone" placeholder="Phone" value="<?php echo $data['phone']; ?>"><br>
		<input type="text" name="address" placeholder="Address" value="<?php echo $data['address']; ?>"><br>
		<input type="submit" name="submit" value="Update">
	</form>
	<?php
		}
	?>
</body>
</html>