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
        $sql = "DELETE FROM Contacts WHERE cid=" .$inData["cid"]; 
        $stmt = $conn->prepare($sql);

        if ($conn->query($sql) === TRUE)
        {
            returnWithContactError("Contact deleted");
        }
        else
        {
            returnWithContactError("Contact not found");
        }
          
        // Close previously established connection.
        $conn->close();
    }
?>
