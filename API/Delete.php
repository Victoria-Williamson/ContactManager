// Delete a contact from the MySQL database.
<?php

    include 'util.php';

    // Take the JSON response and convert it to PHP variable.
    $inData = getRequestInfo();

    // Initialize variable by parsing out JSON response.
    $uid = $inData["uid"];

    // Establish connection with mysqli(host, username, password, database).
    $conn = db_connect();

    // Check connection response.
    if ($conn->connect_error)
    {
        // Connection error.
        returnWithContactError($conn->connect_error);
    }
    else
    {
        // Prepares a SQL statement for execute() function (? is a variable).
        $stmt = $conn->prepare("DELETE FROM Contacts WHERE uid=?");

        // Substitute variables for each (?).
        $stmt->bind_param("s", $inData["uid"]);

        // Execute the prepared query.
        $stmt->execute();

        // Data fetched from database to PHP.
        $result = $stmt->get_result();

        if ($result = $conn->query($stmt) != TRUE)
        {
			returnWithErrorContact("Contact not found.");
		}
        else
        {
            returnWithErrorContact("Contact deleted.");
        }

        // Close previously established connection.
        $conn->close();
    }
?>
