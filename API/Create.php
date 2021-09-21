// Create a new contact.
<?php

    // Get the helper functions
    include './util.php';

    // Take the JSON response and convert it to PHP variable.
	$inData = getRequestInfo();

    // Initialize variables by parsing out JSON response.
    $uid = $inData["uid"];
	$firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $number = $inData["number"];
    $email = $inData["email"];

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
        $stmt = $conn->prepare("INSERT into Contacts (uid, firstName, lastName, number, email) VALUES(?,?,?,?,?)");

        // Substitute variables for each (?).
        $stmt->bind_param("sssss", $uid, $firstName, $lastName, $number, $email);

        // Execute the prepared query.
		$stmt->execute();

        // Query for the statement.
        if ($result = $conn->query($stmt) != TRUE)
        {
            // // Creation failure.
            // returnWithContactError($conn->error);
            
            // Connection error.
		    returnWithUserError($conn->connect_error);
        }
        else
        {
            // Creation success.
            $uid = $conn->insert_id;
            returnWithContactInfo($uid, "", "", "", "", "", "Contact created.");
        }

        // Close previously established connection.
		$stmt->close();
		$conn->close();

         // Login failure.
         returnWithUserError("There was an error creating the account");
	}
?>
