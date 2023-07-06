<?php

include '../config/db.php';
include '../config/functions.php';
include 'transaction.php';
include '../users/user.php';
$transaction = new Transaction();
$user = new User();
if (isset($_POST['num_sender'])) {
    $num_sender = $_POST['num_sender'];
    $num_receiver = $_POST['num_receiver'];
    $amount = $_POST['amount'];
    header('Content-type: application/json');
    if ($user->phoneExist($num_receiver)) {
        $transaction->create($num_sender, $num_receiver, $amount);
        toJson("message", "sent");
    } else {
        toJson("message", "not_receiver_not_exist");
    }
} else {
	header('Content-type: application/json');
    toJson("message", "No POST");
}
?>