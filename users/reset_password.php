<?php

include '../config/db.php';
include '../config/functions.php';
include 'user.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->updatePassword($email, $password);
    $data = $user->fetchDataByEmail($email, $password);
    $data->message = "success";
    echo json_encode($data);
}
?>