<?php 
	include '../config/db.php';
	include '../config/functions.php';
	include '../users/user.php';
	include 'transaction.php';

    $user = new User();
    $transaction = new Transaction();
    $all = "{all:[";
    $query = $transaction->all();
    header('Content-type: application/json');

    if (isset($_GET['total'])) {
        $data = $transaction->getTotalPendingSender($_GET['total']);
        echo json_encode($data);
    } else {

        if (isset($_GET['phone'])) {
            $query = $transaction->getByNum($_GET['phone']);
        }

        while($data = $query->fetch(PDO::FETCH_OBJ)) {
            $data->name_sender = $user->fetchByPhone($data->num_sender)->lastname;
            $data->name_receiver = $user->fetchByPhone($data->num_receiver)->lastname;
            $data->method = $data->type;
            if ($data->type == "QR Code") {
                $data->status = "sent";
            }
            $all .= json_encode($data) .",";
        }

        $all .= "]}";
    
        echo str_replace(',]',']',$all);
    }

?>