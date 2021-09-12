<?php
	include 'util.php';

	$inData = getRequestInfo();

	checkContact($inData["firstName"], $inData["lastName"], $inData["PhoneNumber"],
				 			 $inData["Email"]);
				 
	$uid = $inData["uid"];
	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$phone = $inData["PhoneNumber"];
	$email = $inData["Email"];

	$conn = db_connection();

	if ($conn->connect_error) {
		returnWithErrorContact($conn->connect_error);
	} else {
		$sql = "insert into Contacts (uid, firstName, lastName, PhoneNumber, Email) VALUES 
		(" . $uid . ", '" . $firstName . "', '". $lastName . "', '" . $phone . "', '" . $email ."');";

		if ($result = $conn->query($sql) != TRUE) {
			returnWithErrorContact($conn->error);
		} else {
			$uid = $conn->insert_id;
			returnWithInfoContact($uid, "", "", "", "", "", "", "", "", "");
		}
		
		$conn->close();
	}
?>