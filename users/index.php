<?php 
	include '../config/db.php';
	include '../config/functions.php';
	include 'user.php';
	$user = new User();
	header('Content-type: application/json');
	if (isset($_GET['phone'])) {
		echo  json_encode($user->fetchByPhone($_GET['phone']));
	} else {
		$query = $user->all();
		$all = "[";
		while($data = $query->fetch(PDO::FETCH_OBJ)) {
			$all .= json_encode($data) .",";
		}
		$all .= "]";
		// Set Content-type to JSON
		echo str_replace(',]',']',$all);
	}
?>