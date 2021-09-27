<?php

// Made by ellie :)
include 'util.php';

    // Take the JSON response and convert it to PHP variable.
    $inData = getRequestInfo();

    $resCount = 0;
    $results = array();

    // Establish connection with mysqli(host, username, password, database).
    $connection = db_connect();

    // Check connection response.
    if ($connection->connect_error) 
    {
        returnWithContactError($connection->connect_error);
    }
    else
    {
        // Search through first and last names that belong to the user. Parenthesis for unambiguity!
        $stmt = $connection->prepare("SELECT * FROM Contacts WHERE (firstName LIKE ? OR lastName LIKE ? )AND uid=?");
        $search = "%" . $inData["search"] . "%";

        // Bind each (?) variable with it's data.
        $stmt->bind_param('sisi', $search, $inData['uid'], $search, $inData['uid']);

        // Execute statement.
        $stmt->execute();

        // Data fetched from database to PHP.
		$result = $stmt->get_result();
        
        if ($result->num_rows > 0)
        {
            // Keep searching until there's no more rows.
            while ($row = $result->fetch_assoc())
            {
                $results[$resCount] = createObjectContact($row["uid"], $row["cid"],$row["firstName"], $row["lastName"], $row["PhoneNumber"], $row["Email"], "");

                // Increase result count.
                $resCount++;
            }
        }
        else
        {
            returnWithContactError("No contacts matching search");
        }
    }
     // Send results.
     sendResultInfoAsJSON(json_encode($results));

    // Close established connections.
    $stmt->close();
    $connection->close();
?>
