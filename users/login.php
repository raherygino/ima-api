<?php

	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';
	if (isset($_POST['phone'])) {

		$phone = $_POST['phone'];
		$password = $_POST['password'];

		$user = new User();

        if ($user->login($phone, $password)) {
            $data = $user->fetchData($phone, $password);
            echo json_encode($data);
        } else {
			toJson("message", "user_not_exist");
        }

	} else {
		toJson("message", "No request POST");
	}
 ?>