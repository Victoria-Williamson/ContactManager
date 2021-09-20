// Register a user in MySQL.
<?php

	// Get the helper functions
    include './util.php';

    // Take JSON response and convert it to a PHP variable.
	$inData = getRequestInfo();

    // Check if user values are valid.
	checkUser($inData["login"], $inData["password"], $inData["firstName"], $inData["lastName"]);

	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$password = $inData["password"];
    $login = $inData["login"];

    // Establish connection with mysqli(host, username, password, database).
	$conn = db_connection();

	if ($conn->connect_error)
    {
        // Database failure.
		returnWithUserError($conn->connect_error);
	}
    else
    {
        // SQL statment preparation.
		$stmt = "INSERT into Users (firstName, lastName, login, password) VALUES ('" . $firstName . "', '". $lastName . "', '" . $login . "', '" . $password . "')";

        // Query for the statement.
		if ($result = $conn->query($stmt) != TRUE)
        {
            // Query failed.
			returnWithErrorUser($conn->error);
		}
        else
        {
            // Query success.
			$uid = $conn->insert_id;
			returnWithUserInfo($uid, $firstName, $lastName, "");
		}
	}

    // Close previously established connection.
    $stmt->close();
    $conn->close();
?>
