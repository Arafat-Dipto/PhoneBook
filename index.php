<?php
include 'Connection.php';
$db = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Phone Book</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="fontawesome-free/css/all.css">
	</head>
	<body class="table-success">
		<div class="container">
			<h1 class="text-lg-center text-sm-center">Phone Book</h1>
			<?php
				if(isset($_POST['submit'])){
					if(!empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['address'] )){
						$db->addContact($_POST['username'],$_POST['phone'],$_POST['address']);
						echo "Successfully Registered...!!";
					}else{
						echo "All fields must be filled up!!";
					}
				}
			?>
			<form method="POST" action="" style="border: 2px solid black; padding: 20px; margin-right: 300px; margin-left: 300px;" class="form-group text-center">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
					</div>
					<input type="text" name="username" placeholder="Username" class="form-control">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
					</div>
					<input type="text" name="phone" placeholder="Phone" class="form-control">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-address-book"></i></span>
					</div>
					<input type="text" name="address" placeholder="Address" class="form-control">
				</div>
				
				<input type="submit" name="submit" value="Register" class="btn btn-success">
			</form>
		</div>
		<div style="padding: 30px;">
			<?php
				$results = $db->getAllContacts();
				
			?>
			<table  class="container table table-striped">
				<tr>
					<th>Name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<?php
					foreach ($results as $data) {
				?>
				<tr>
					<td><?php echo $data['username'] ?></td>
					<td><?php echo $data['phone'] ?></td>
					<td><?php echo $data['address'] ?></td>
					<td><a href="update.php?id=<?php echo $data['id']; ?>">Edit</a> | <a onclick="return confirm('are you sure?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</body>
</html>