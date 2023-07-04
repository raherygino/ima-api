<?php
$to      = 'georgino197@gmail.com';
$subject = 'Code de reinitialisation';
$message = 'Voici le code réinitilisation de votre mot de passe: 45007955';
$headers = array(
    'From' => 'ima_admin@eluos.mg',
    'Reply-To' => 'ima_admin@eluos.mg',
    'X-Mailer' => 'PHP/' . phpversion()
);

if(mail($to, $subject, $message, $headers)) {
    echo "sent!";
} else {
    echo "error!";
}

?>