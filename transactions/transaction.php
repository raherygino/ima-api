<?php 
	class Transaction {
		protected $db;

    	public function __construct(){

      		$db = Database::_DB();
      		$this->db = $db;
    	}

    	public function create($num_sender, $num_receiver, $amount) {
    		$query = $this->db->prepare("INSERT INTO transaction_user (id_transaction, num_sender, num_receiver, amount, status, created_at, updated_at) VALUES (NULL, '$num_sender', '$num_receiver', '$amount', 'pending', NOW(), NOW())");
    		$query->execute();
    		return $query;
   		}

        public function getPendingSender($num_sender) {
            $query = $this->db->prepare("SELECT * FROM transaction_user WHERE num_sender = '$num_sender' AND status = 'pending' ");
            $query->execute();
            return $query;
        }

        public function all() {
            $query = $this->db->prepare("SELECT * FROM transaction_user");
            $query->execute();
            return $query;
        }

    }
?>