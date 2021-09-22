<?php

    // Get the helper functions
    include './util.php';

    // Take the JSON response and convert it to PHP variable.
	$inData = getRequestInfo();

 

    // Establish connection with mysqli(host, username, password, database).
    $conn = db_connect();

    // Check connection response.
	if ($conn->connect_error)
	{
        // Connection error.
		returnWithContactError( $conn->connect_error );
	}
	else
	{
        // Prepares a SQL statement for execute() function (? is a variable).
        $stmt = $conn->prepare("INSERT into Contacts (uid, firstName, lastName, PhoneNumber, Email) VALUES(?,?,?,?,?)");

        // Substitute variables for each (?).
        $stmt->bind_param("sssss", $inData['uid'], $inData['firstName'], $inData['lastName'], $inData['number'], $inData['email']);

        // // Execute the prepared query.
		// $stmt->execute();

        // Query for the statement.
        if ($stmt->execute())
        {
            // Creation success.
            $cid = $stmt->insert_id;
            returnWithContactInfo($cid, "", "", "", "", "", "Contact created.");
        }
        else
        {
            // Connection error.
		    returnWithContactError($conn->error);
        }
         // Close previously established connection.
		$stmt->close();
	}
       
		$conn->close();
?>