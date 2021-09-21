<?php

   // Get the helper functions
   include './util.php';

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
        try
        {
            $stmt = $conn->prepare("DELETE FROM Contacts WHERE uid =?");

            // Substitute variables for each (?).
            $stmt->bind_param("s", $inData["uid"]);
    
            // Execute the prepared query.
            $stmt->execute();
    
            // Data fetched from database to PHP.
            $result = $stmt->get_result();

            returnWithContactError("Contact deleted.");
        } catch (PDOException $e)
        {
            returnWithContactError("Contact not found.");
        }
        

        // Close previously established connection.
        $stmt->close();
        $conn->close();
    }
?>
