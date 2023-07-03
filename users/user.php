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

    	public function insertCode($email, $code) {
    		$query = $this->db->prepare("UPDATE users SET code = '$code' WHERE email = '$email'");
    		$query->execute();
    		return $query;
   		}

    	public function updatePassword($email, $password) {
    		$query = $this->db->prepare("UPDATE users SET password = '$password' WHERE email = '$email'");
    		$query->execute();
    		return $query;
   		}

   		public function emailExist($email) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE email = '$email'");
   			$query->execute();
   			if ($query->rowCount() == 0) {
   				return false;
   			} else {
   				return true;
   			}
   		}

   		public function phoneExist($phone) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE phone = '$phone'");
   			$query->execute();
   			if ($query->rowCount() == 0) {
   				return false;
   			} else {
   				return true;
   			}
   		}

   		public function login($phone, $password) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE phone = '$phone' AND password = '$password'");
   			$query->execute();
   			if ($query->rowCount() == 0) {
   				return false;
   			} else {
   				return true;
   			}
   		}

   		public function checkCode($email, $code) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE email = '$email' AND code = '$code'");
   			$query->execute();
   			if ($query->rowCount() == 0) {
   				return false;
   			} else {
   				return true;
   			}
   		}

   		public function fetchData($phone, $password) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE phone = '$phone' AND password = '$password'");
   			$query->execute();
			$data = $query->fetch(PDO::FETCH_OBJ);
			return $data;
   		}

   		public function fetchDataByEmail($email, $password) {
   			$query = $this->db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
   			$query->execute();
			$data = $query->fetch(PDO::FETCH_OBJ);
			return $data;
   		}
	}	
?>