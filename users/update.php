<?php

include '../config/db.php';
include '../config/functions.php';
include 'user.php';
$user = new User();
header('Content-type: application/json');

if (isset($_POST['update_amount'])) {
    $user->updateBalance($_POST['phone'], $_POST['update_amount']);
    toJson("message", "update");
} else {
    toJson("message", "No Post");
}

?>