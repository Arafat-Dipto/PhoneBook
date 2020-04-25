<?php

class Connection{
	public $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=ctg323","root","");
	}

	//get all contacts
	public function getAllContacts($user_id){
		$statement = $this->conn->prepare("SELECT * FROM phonebook WHERE user_id='$user_id'");
		$statement ->execute();
		$data = $statement->fetchAll();
		return $data;
	}

	//add a contact
	public function addContact($username,$phone,$address,$user_id){
		$statement = $this->conn->prepare("INSERT INTO phonebook (username,phone,address,user_id) VALUES(:username,:phone,:address,:user_id)");
				$statement->execute(
					array(
						':username' => $username,
						':phone' => $phone,
						':address' => $address,
						':user_id' => $user_id
					)
				);
	}


	//get a contact
	public function getContact($id)
	{
		$statement = $this->conn->prepare("SELECT * FROM phonebook WHERE id=$id;");
		$statement->execute();
		$data = $statement->fetchAll();
		return $data;	
	}

	//edit a contact
	public function editContact($username,$phone,$address,$id){
		$statement = $this->conn->prepare("UPDATE phonebook SET username = '$username', phone = '$phone', address = '$address' WHERE id=$id;");
		$statement ->execute();
		
	}

	//delete a contact
	public function deleteContact($id){
		$statement = $this->conn->prepare("DELETE FROM phonebook WHERE id=$id;");
		$statement ->execute();
	}

	//insert data in database
	public function insert($query,$array){
		$statement = $this->conn->prepare($query);
		$statement ->execute($array);	
	}

	//fetch data from database
	public function fetch($query,$array){
		$statement = $this->conn->prepare($query);
		$statement ->execute($array);
		$data = $statement->fetchAll();
		return $data;
	}

}

	
?>