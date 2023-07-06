<?php 
	include '../config/db.php';
	include '../config/functions.php';
	include '../users/user.php';
	include 'transaction.php';

    $user = new User();
    $transaction = new Transaction();
    $all = "[";
    $query = $transaction->all();

    if (isset($_GET['phone'])) {
        $query = $transaction->getPendingSender($_GET['phone']);
    }

    while($data = $query->fetch(PDO::FETCH_OBJ)) {
        $all .= json_encode($data) .",";
    }
    $all .= "]";
    
	header('Content-type: application/json');
	echo str_replace(',]',']',$all);
?>