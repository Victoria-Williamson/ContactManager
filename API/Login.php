<?php

	include './util.php';
	// database password: projecT1a
	// digital ocean SQL password : e74343b24d94358052af1404d4c50d7237a7aa51effd4540
	
    // Take JSON response and convert it to a PHP variable.
	$inData = getRequestInfo();

    // Initialize empty variables.
	$uid = 0;
	$firstName = "";
	$lastName = "";

    // Establish connection with mysqli(host, username, password, database).
    $conn = db_connect();
    // Check connection response.
	if ($conn->connect_error)
	{
        // Connection error.
		returnWithUserError($conn->connect_error);
	}
	else
	{
		checkUser($inData["login"], $inData["password"], $inData["firstName"], $inData["lastName"]);
        // Prepares a SQL statement for execute() function (? is a variable).
		$stmt = $conn->prepare("SELECT uid,firstName,lastName FROM Users WHERE Login=? AND Password =?");

        // Substitute variables for each (?).
		$stmt->bind_param("ss", $inData["login"], $inData["password"]);

        // Execute the prepared query.
		$stmt->execute();

        // Data fetched from database to PHP.
		$result = $stmt->get_result();

        // If the record is found, log in.
		if ($row = $result->fetch_assoc())
		{
            // Login success.
			returnWithUserInfo($row['uid'], $row['firstName'], $row['lastName'], "");
		}
		else
		{
            // Login failure.
            returnWithUserError("Password or username incorrect.");
		}

        // Close previously established connection.
		$stmt->close();
		$conn->close();
	}

?>
