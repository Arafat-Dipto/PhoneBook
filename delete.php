<?php
include 'Connection.php';
$db = new Connection();

if(isset($_GET['id'])){
	$db->deleteContact($_GET['id']);
	header("location: index.php");
}

?>