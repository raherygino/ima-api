<?php

	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';

	if (isset($_POST['email'])) {
        $code = $_POST['code']; 
        $email = $_POST['email'];
        $user = new User();
		if ( $user->checkCode($email, $code)) {
			toJson("message", "success");
		} else {
			toJson("message", "code_invalid");
        }
    }

?>