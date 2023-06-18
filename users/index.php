<?php 

$data = array(
	"lastname" => "Georginot",
	"firstname" => "Armelin",

);

if (isset($_POST['firstname'])) {/*
	$data = array(
		"firstname" => $_POST['firstname']
	);*/
echo $_POST['firstname'];
}


?>