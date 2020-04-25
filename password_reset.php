<?php
session_start();
include 'Connection.php';
$db = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password reset</title>
</head>
<body>

	<?php
		if(isset($_POST['submit'])){

			$token = $_POST['token'];
			$chk_t = "SELECT * FROM reset where token='$token'";
			$res = $db->fetch($chk_t,null);
			if(count($res) == 1 && $_POST['password'] == $_POST['password_confirmed']){
				$del_q = "DELETE from reset WHERE token='$token'";
				$db->insert($del_q,null);
					foreach($res as $data){
						$p = md5($_POST['password']);
						$user_id = $data['user_id'];
						$update_q = "UPDATE users SET password = '$p' WHERE id='$user_id'";
						$db->insert($update_q,null);
					}
					echo "password updated";
				
			}else{
				echo "token does not match / password not match";
			}
		}
	?>

	<form action="" method="POST">
		<input type="text" name="token" placeholder="Token">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="password_confirmed" placeholder="Confirm password">
		<input type="submit" name="submit" value="change password">
	</form>
</body>
</html>