// Retrieve a contact from MySQL.
<?php
    // updated
    // Get the helper functions
    include './util.php';

    // Take JSON response and convert it to a PHP variable.
    $inData = getRequestInfo();

    $results = array();
    $resCount = 0;
    $uid = $inData["uid"];

    // Establish connection with mysqli(host, username, password, database).
	$conn = db_connect();
    
    if ($conn->connect_error)
    {
        // Connection failure.
        returnWithContactError($conn->connect_error);
    }
    else
    {
        $stmt = "SELECT * FROM Contacts WHERE uid=" . $uid . ";";
        $result = $conn->query($stmt);

        if ($result->num_rows > 0)
        {
            // Keep fetching rows until there's no more.
            while ($row = $result->fetch_assoc())
            {
                $results[$resCount] = createObjectContact($row["uid"], $row["cid"],
                                                          $row["firstName"], $row["lastName"], 
                                                          $row["PhoneNumber"], $row["Email"], "");

                // Increase result count.
                $resCount++;
            }
        }
        else
        {
            returnWithContactError("No records found.");
        }
    }

    // Send results.
    sendResultInfoAsJSON(json_encode($results));

    // Close previously established connection.
    $stmt->close();
    $conn->close();
?>
