<?php

// Make by ellie :) 
include 'util.php';

    $inData = getRequestInfo();

    $searchResults = "";
    $searchCount = 0;
    $resCount = 0;
    $results = array();

    $connection = db_connect();

    if ($connection->connect_error) 
    {
        returnWithContactError($connection->connect_error);
    }
    else
    {
        // Search through first and last names that belong to the user. Parenthesis for unambiguity!
        $stmt = $connection->prepare("SELECT FROM Contacts WHERE (firstName LIKE %?% or lastName LIKE %?%) AND uid=?");

        $stmt->bind_param('ssi', $inData['search'], $inData['search'], $inData['uid']);

        $stmt->execute();
         // Data fetched from database to PHP.
		$result = $stmt->get_result();
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
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

     $stmt->close();
     $connection->close();
    ?>