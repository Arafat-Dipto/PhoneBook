<?php
include 'Connection.php';
$db = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="fontawesome-free/css/all.css">
	</head>
	<body class="table-success">
		<?php
			if(isset($_POST['submit'])){
				$user = $_POST['username'];
				$pass = md5($_POST['password']);
				$tmp = $_FILES['image']['tmp_name'];
				if($tmp == null){
					$img_name = "avatar.jpg";
				}else{
					$img_name = uniqid().".jpg";
				}

				$query = "INSERT INTO users (username,password,image) VALUES ('$user','$pass','$img_name')";
				$db->insert($query,null);
				
				
				move_uploaded_file($tmp, "photos/".$img_name);
				echo "Registered..!!";
			}
		?>
		<div class="container">
			<h1 class="text-lg-center text-sm-center">Register for an Account</h1>
			
			<form action="" method="POST" enctype="multipart/form-data" style="border: 2px solid black; padding: 20px; margin-right: 300px; margin-left: 300px;" class="form-group text-center">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
					</div>
					<input type="text" placeholder="Username" name="username" class="form-control">
				</div>
				<input type="file" name="image" accept="image/*" class="form-control mb-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" placeholder="Password" name="password" class="form-control">
				</div>
				<input type="submit" name="submit" value="Register" class="btn btn-success">
			</form>
			
		</div>
	</body>
</html>