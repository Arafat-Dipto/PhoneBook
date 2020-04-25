<?php
session_start();
include 'Connection.php';
$db = new Connection();

if(isset($_SESSION['user_id']) != null ){
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome-free/css/all.css">
</head>
<body class="table-success">

	<?php
		if(isset($_POST['submit'])){
			$user = $_POST['username'];
			$pass = md5($_POST['password']);
			$query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
			$result = $db->fetch($query,null);
			if(count($result) == 1){
				
				foreach($result as $data){
					$_SESSION['user_id'] = $data['id'];
					$_SESSION['user_name'] = $data['username'];
					$_SESSION['image'] = $data['image'];
				}
				header("location: index.php");
			}else{
				echo "<p style='color:red;'>Credentials does not match</p>";
			}
		}
	?>
	<div class="container">
	<h1 class="text-lg-center text-sm-center">Login Account</h1>
	
	<form action="" method="POST" style="border: 2px solid black; padding: 20px; margin-right: 300px; margin-left: 300px;" class="form-group text-center">

		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
					</div>
					<input type="text" placeholder="Username" name="username" class="form-control">
				</div>
		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" placeholder="Password" name="password" class="form-control">
				</div>
		<input type="submit" name="submit" value="Login" class="btn btn-success"><br>
		<a href="forget.php" class="text-primary">forget password</a>
	</form>


		
	</div>
</body>
</html>