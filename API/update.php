<?php
	// updated by nicolas
	// Get the helper functions
    include './util.php';

    // Take JSON response and convert it to a PHP variable.
	$inData = getRequestInfo();
				 
	$uid = $inData["uid"];
	$cid = $inData["cid"];
	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$phone = $inData["phoneNumber"];
	$email = $inData["email"];

    // Establish connection with mysqli(host, username, password, database).
	$conn = db_connect();

	if ($conn->connect_error)
    {
        // MySQL connection failure.
		returnWithContactError($conn->connect_error);
	}
    else
    {
        // Prepare SQL query statement.
		$stmt = "SELECT * FROM Contacts WHERE cid=" . $cid . ";";

        // Perform database query.
		$result = $conn->query($stmt);

        // Update every row.
		if ($result->num_rows > 0)
        {
            // If the record is found, log in.
			$row = $result->fetch_assoc();

			$currentFirstName = $row["firstName"];
			$currentLastName = $row["lastName"];
			$currentPhone = $row["PhoneNumber"];
			$currentEmail = $row["Email"];

            // Update records.
			if (($currentFirstName != $firstName) && ($firstName == ""))
            {
				$firstName = $currentFirstName;
			}
			if (($currentLastName != $lastName) && ($lastName == ""))
            {
				$lastName = $currentLastName;
			}
			if (($currentPhone != $phone) && ($phone == ""))
            {
				$phone = $currentPhone;
			}
			if (($currentEmail != $email) && ($email == ""))
            {
				$email = $currentEmail;
			}
		}
	}

	// Prepare SQL statement.
	$stmt = $conn->prepare("UPDATE Contacts SET firstName =?, lastName =?, PhoneNumber =?', Email =? WHERE cid =?");

	$stmt->bind_param("ssssi", $firstName, $lastName, $phone, $email, $cid);

	$stmt->execute();

	if ($stmt->error)
    {
        // Query failure.
		returnWithContactError("Contact not found.");
	}
    else
    {
        // Query success.
		returnWithContactInfo($uid, $cid, $firstName, $lastName, $email, $phone, "Contact updated.");
	}
		
    // Close previously established connection.
    $stmt->close();
    $conn->close();
?>
