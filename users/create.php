<?php

	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';
	if (isset($_POST['lastname'])) {

		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$birthplace = $_POST['birthplace'];
		$id_card = $_POST['id_card'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$token = "bc44xc44sf4f4c44v465";

		$user = new User();
		$created = $user->create($lastname, $firstname, $gender, $birthday, $birthplace, $id_card, $country, $city, $phone, $email, $password, $token);
		toJson("message", "created");
			
	} else {
		toJson("message", "No request POST");
	}
	
	$user = new User();
	$created = $user->create("", "", "", "", "", "", "", "", "","", "", "");
	//echo "ok";
 ?>