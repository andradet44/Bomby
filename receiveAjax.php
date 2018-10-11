<?php
//////////////////////////////////////////////////////////////////////////////////////
// Données client AJAX

// AJAX 1
$clientData = json_decode($_POST['clientData'], true);
$player_id = $clientData['player_id'];

//////////////////////////////////////////////////////////////////////////////////////
// Ouverture BD

// Paramètres de connexion
include_once("dbConfig.php");

// Ouverture connexion
$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);

// Requète
$order_request = "SELECT * FROM `orders` WHERE `player_id` = '$player_id';";
$result = $mysqli->query($order_request);

$orders = [];
while ($line = $result->fetch_assoc()) {
$orders = $line;

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
