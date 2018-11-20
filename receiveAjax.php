<?php
//////////////////////////////////////////////////////////////////////////////////////
// Données client AJAX

// AJAX 1
$clientData = json_decode($_POST['clientData'], true);
$none_value = $clientData['none_value'];

//////////////////////////////////////////////////////////////////////////////////////
// Ouverture BD

// Paramètres de connexion
include_once("dbConfig.php");

// Ouverture connexion
$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);

// Requète
$order_request = "SELECT * FROM `orders` inner join `players` on `orders`.`player_id` = `players`.`player_id` group by `orders`.`player_id`, `order`";
$result = $mysqli->query($order_request);

$orders = [];
while ($line = $result->fetch_assoc()) {
	 // $orders->append($line);
	 array_push($orders, $line);
}




// Fermeture connection
$mysqli->close();

sendAjax($orders);


function sendAjax($order){
	//////////////////////////////////////////////////////////////////////////////////////
	// Sending ajax

	// AJAX 1
	$objetJSON = array();
	$objetJSON[] = array("order" => $order);

	// Serialize
	$serverData = json_encode($objetJSON);

	// Serialize et envoie reponse
	echo "$serverData";
}








?>
