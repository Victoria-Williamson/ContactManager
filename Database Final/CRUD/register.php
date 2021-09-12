<?php
	include 'util.php';

	$inData = getRequestInfo();
	checkUser($inData["login"], $inData["password"], $inData["firstName"], $inData["lastName"]);

	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$login = $inData["login"];
	$password = $inData["password"];
	
	$conn = db_connection();

	if ($conn->connect_error) {
		returnWithErrorUser($conn->connect_error);
	} else {
		$sql = "insert into Users (firstName, lastName, login, password) VALUES ('" . $firstName . 
		"', '". $lastName . "', '" . $login . "', '" . $password . "')";

		if ($result = $conn->query($sql) != TRUE) {
			returnWithErrorUser($conn->error);
		} else {
			$uid = $conn->insert_id;
			returnWithInfoUser($uid, "", "", $firstName, $lastName, "");
		}

		$conn->close();
	}
?>