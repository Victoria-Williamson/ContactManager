<?php
	include 'util.php';

	$inData = getRequestInfo();
	checkUser($inData["Login"], $inData["Password"], $inData["FirstName"], $inData["LastName"]);

	$firstName = $inData["FirstName"];
	$lastName = $inData["LastName"];
	$login = $inData["Login"];
	$password = $inData["Password"];
	
	$conn = db_connection();

	if ($conn->connect_error) {
		returnWithErrorUser($conn->connect_error);
	} else {
		$sql = "insert into Users (FirstName, LastName, Login, Password) VALUES ('" . $firstName . 
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