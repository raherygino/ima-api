<?php 
	class Transaction {
		protected $db;

    	public function __construct(){

      		$db = Database::_DB();
      		$this->db = $db;
    	}

    	public function create($num_sender, $num_receiver, $amount, $type) {
            $status = "pending";
            if (strpos($type, "QR") == 0) {
                $status == "sent";
            }
    		$query = $this->db->prepare("INSERT INTO transaction_user (id_transaction, num_sender, num_receiver, amount, status, type, created_at, updated_at) VALUES (NULL, '$num_sender', '$num_receiver', '$amount', '$status', '$type', NOW(), NOW())");
    		$query->execute();
    		return $query;
   		}

    	public function updateStatus($id, $status) {
    		$query = $this->db->prepare("UPDATE transaction_user SET status = '$status' WHERE id_transaction = '$id'");
    		$query->execute();
    		return $query;
   		}

        public function getPendingSender($num_sender) {
            $query = $this->db->prepare("SELECT * FROM transaction_user WHERE (num_sender = '$num_sender' OR num_receiver = '$num_sender') AND status = 'pending' ");
            $query->execute();
            return $query;
        }

        public function getByNum($phone) {
            $query = $this->db->prepare("SELECT * FROM transaction_user WHERE (num_sender = '$phone' OR num_receiver = '$phone') ORDER BY id_transaction DESC");
            $query->execute();
            return $query;
        }

        public function getTotalPendingSender($num_sender) {
            $query = $this->db->prepare("SELECT num_sender, status, sum(amount) as total FROM transaction_user WHERE num_sender = '$num_sender' AND status = 'pending' ");
            $query->execute();
			$data = $query->fetch(PDO::FETCH_OBJ);
			return $data;
        }

        public function all() {
            $query = $this->db->prepare("SELECT * FROM transaction_user");
            $query->execute();
            return $query;
        }

    }
?>