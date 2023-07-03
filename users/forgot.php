<?php

	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';

	if (isset($_POST['email'])) {
        $code = rand(100000, 999999); 
        $email = $_POST['email'];
        $user = new User();
		if ($user->emailExist($email)) {
            $user->insertCode($email, $code);
            toJson("code", $code);
		} else {
			toJson("message", "email_not_exist");
        }
    }

?>