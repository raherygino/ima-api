<?php 
	class User {
		protected $db;

    	public function __construct(){

      		$db = Database::_DB();
      		$this->db = $db;
    	}

    	public function create($lastname, $firstname, $gender, $birthday, $birthplace, $id_card, $country, $city, $phone, $email, $password, $token) {
    		$query = $this->db->prepare("INSERT INTO users (id, lastname, firstname, gender, birthday, birthplace, id_card, country, city, phone, email, password, token, created_at) VALUES (NULL, '$lastname', '$firstname', '$gender', '$birthday', '$birthplace', '$id_card', '$country', '$city', '$phone', '$email', '$password','$token', NOW())");
    		$query->execute();
    		return $query;
   		}
	}	
?>