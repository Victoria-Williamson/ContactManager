<?php
    // updated by nicolas
	// Get the helper functions
    include './util.php';

    // Take JSON response and convert it to a PHP variable.
	$inData = getRequestInfo();
    
     // Initialize empty variables.
	$uid = 0;
	$firstName = "";
	$lastName = "";
    $password = "";
    $login = "";

   

    // Establish connection with mysqli(host, username, password, database).
	$conn = db_connect();

     // Check if user values are valid.
	checkUser($inData["login"], $inData["password"], $inData["firstName"], $inData["lastName"]);

	if ($conn->connect_error)
    {
        // Database failure.
		returnWithUserError($conn->connect_error);
	}
    else
    {
        $firstName = $inData["firstName"];
        $lastName = $inData["lastName"];
        $password = $inData["password"];
        $login = $inData["login"];
        
        if ($inData['firstName'] == NULL)
        {
            returnWithUserError("Data not being read");
        }
        // SQL statment preparation.
		$stmt = "INSERT into Users (firstName, lastName, login, password) VALUES ('" . $firstName . "', '". $lastName . "', '" . $login . "', '" . $password . "')";

        // Query for the statement.
        
		if ($result = $conn->query($stmt) != TRUE)
        {
            // Query failed.
			returnWithUserError($conn->error);
		}
        else
        {
			$uid = $conn->insert_id;
			returnWithUserInfo($uid, $firstName, $lastName, "");
		}
	}

    // Close previously established connection.
    $stmt->close();
    $conn->close();
?>
