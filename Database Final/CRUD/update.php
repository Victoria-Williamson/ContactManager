<?php
	include 'util.php';

	$inData = getRequestInfo();
				 
	$uid = $inData["uid"];
	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$phone = $inData["PhoneNumber"];
	$email = $inData["Email"];
	

	$conn = db_connection();
	if ($conn->connect_error) {
		returnWithErrorContact($conn->connect_error);
	} else {
		$sql = "SELECT * FROM Contacts WHERE uid=" . $uid . ";";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			$currentFirstName = $row["firstName"];
			$currentLastName = $row["lastName"];
			$currentPhone = $row["PhoneNumber"];
			$currentEmail = $row["Email"];
			

			if ($currentFirstName != $firstName && $firstName == "") {
				$firstName = $currentFirstName;
			}

			if ($currentLastName != $lastName && $lastName == "") {
				$lastName = $currentLastName;
			}

			if ($currentPhone != $phone && $phone == "") {
				$phone = $currentPhone;
			}

			if ($currentEmail != $email && $email == "") {
				$email = $currentEmail;
			}
		}
	}

	
	$sql = "UPDATE Contacts
					SET firstName = '" . $firstName .
					"', lastName = '" . $lastName . 
					"', PhoneNumber = '" . $phone .
					"', Email = '" . $email .  
					"WHERE uid = " . $uid . ";";

	if ($result = $conn->query($sql) != TRUE) {
		returnWithErrorContact("No Records Found");
	} else {
		returnWithInfoContact($uid, $firstName, $lastName, $phone, 
													$email, "");
	}
		
	$conn->close();
?>