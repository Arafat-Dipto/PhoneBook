<?php
session_start();
include 'Connection.php';
$db = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forget Password</title>
</head>
<body>
	<?php
		if(isset($_POST['submit'])){
			$user = $_POST['username'];
			$query = "SELECT * FROM users WHERE username='$user'";
			$res = $db->fetch($query,null);
			if(count($res) == 1){
				foreach($res as $data){
					$t = rand(1000,9999);
					$user_id = $data['id'];
					$token_q = "INSERT INTO reset (token,user_id) VALUES ('$t','$user_id')";
					$db->insert($token_q,null);
					header("location: password_reset.php");
				}
			}else{
				echo "user not found";
			}
		}
	?>
	

	<form action="" method="POST">
		<input type="text" name="username"><br>
		<input type="submit" name="submit" value="Send Request">
	</form>
</body>
</html>