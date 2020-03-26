<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome-free/css/all.css">
</head>
<body class="table-success">
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
	<div class="container">
	<h1 class="text-lg-center text-sm-center">Phone Book</h1>
	<form method="POST" action="" style="border: 2px solid black; padding: 20px; margin-right: 300px; margin-left: 300px;" class="form-group text-center">

		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
					</div>
					<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $data['username']; ?>">
				</div>

		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
					</div>
					<input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo $data['phone']; ?>">
				</div>

		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-address-book"></i></span>
					</div>
					<input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $data['address']; ?>">
				</div>
		<input type="submit" name="submit" class="btn btn-success" value="Update">
	</form>
	</div>
	<?php
		}
	?>
</body>
</html>