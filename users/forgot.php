<?php

	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';

	if (isset($_POST['email'])) {
        $code = rand(100000, 999999); 
        $email = $_POST['email'];
        $user = new User();
		if ($user->emailExist($email)) {
		    if (sendEmail($email, $code)) {
                $user->insertCode($email, $code);
                toJson("code", $code);
		    } else {
			    toJson("message", "email_not_sent");
		    }
		} else {
			toJson("message", "email_not_exist");
        }
    }
    
    function sendEmail($to, $code) {
        $subject = 'Code de reinitialisation';
        $message = 'Voici le code réinitilisation de votre mot de passe: '.$code;
        $headers = array(
            'From' => 'ima_admin@eluos.mg',
            'Reply-To' => 'ima_admin@eluos.mg',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        
        return mail($to, $subject, $message, $headers);
    }

?>