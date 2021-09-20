// Search for contacts.
<?php
   
   // Get the helper functions
   include './util.php';

    // Take JSON response and convert it to a PHP variable.
    $inData = getRequestInfo();

    $searchResults = "";
    $searchCount = 0;

    // Establish connection with mysqli(host, username, password, database).
    $conn = db_connect();

    if ($connection->connect_error)
    {
        // MySQL connection failed.
        returnWithContactError($connection->connect_error);
    }
    else
    {
        // Search using first and last name.
        $stmt = "SELECT FROM Contacts WHERE (firstname like '%" . $inData["search"] . "%' or LASTNAME like '%" . $inData["search"] . "%') and USERID=" . $inData["id"];

        if ($result = $conn->query($stmt) != TRUE)
        {
            // Database query failed.
            returnWithContactError("No matches");
        }
        else
        {
            $searchResults .= '"resultCount" : ' . $result->num_rows . ',';
            $searchResults .= '"results" : [';

            // Keep fetching rows until there's no more.
            while ($row = $result->fetch_assoc())
            {
                // Concatenate comma after all results except the first.
                if ($searchCount > 0)
                {
                    $searchResults .= ",";
                }
                $searchCount++;

                // Write results in proper JSON format.
                $searchResults .= '{';
                $searchResults .= '"contactID" : ' . $row["ID"] . ', ';
                $searchResults .= '"contactFirstName" : "' . $row["FIRSTNAME"] . '", ';
                $searchResults .= '"contactLastName" : "' . $row["LASTNAME"] . '", ';
                $searchResults .= '"contactEmail" : "' . $row["EMAIL"] . '", ';
                $searchResults .= '"contactPhone" : "' . $row["PHONE"] . '", ';
                $searchResults .= '"contactDateCreated" : "' . $row["DATECREATED"] . '"';
                $searchResults .= '}';
            }

            // End of JSON.
            $searchResults .= ']';

            // Return results as JSON.
            returnWithInfo($searchResults);
        }

        // Close previously established connection.
        $stmt->close();
        $conn->close();
    }
?>
