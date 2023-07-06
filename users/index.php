<?php 
	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';
	$user = new User();
	$query = $user->all();
	$all = "[";
	while($data = $query->fetch(PDO::FETCH_OBJ)) {
		$all .= json_encode($data) .",";
	}
	$all .= "]";
	// Set Content-type to JSON
	header('Content-type: application/json');
	echo str_replace(',]',']',$all);
?>