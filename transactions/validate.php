<?php 

include '../config/db.php';
include '../config/functions.php';
include 'transaction.php';
include '../users/user.php';
$transaction = new Transaction();
$user = new User();
header('Content-type: application/json');

if (isset($_POST['id'])) {
    $transaction->updateStatus($_POST['id'], "sent");
    $userData = $user->fetchByPhone($_POST['phone']);
    $balance = $userData->balance;
    $newBalance = $balance + $_POST['amount'];
    $user->updateBalance($_POST['phone'], $newBalance);
    toJson("message", "sent");
} else {
    toJson("message", "No post method");
}

?>

