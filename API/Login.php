// Login a user with password and username.
<?php

	// Get the helper functions
	include 'util.php';
	
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
