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
        // SQL statment preparation.
		$stmt = $conn->prepare("INSERT into Users (firstName, lastName, login, password) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss",$inData["firstName"], $inData["lastName"],$inData["password"],$inData["login"]);

        $stmt->execute();
    
        
		if ($stmt->execute())
        {
            $uid = $stmt->insert_id;
			returnWithUserInfo($uid, $firstName, $lastName, "");
			
		}
        else
        {
			returnWithUserError($conn->error);
		}
	}

    // Close previously established connection.
    $stmt->close();
    $conn->close();
?>
