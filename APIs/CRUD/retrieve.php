<?php
    include 'util.php';

    $inData = getRequestInfo();

    $results = array();
    $resCount = 0;
    $uid = $inData["uid"];

	$conn = db_connection();
    
    if ($conn->connect_error) {
        returnWithErrorContact($conn->connect_error);
    } else {
        $sql = "SELECT * FROM Contacts WHERE uid=" . $uid . ";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $results[$resCount] = createObjectContact($row["uid"], $row["cid"],
                                                          $row["firstName"], $row["lastName"], 
                                                          $row["PhoneNumber"], $row["Email"], "");
                $resCount++;
            }
        } else {
            returnWithErrorContact("No records found");
        }

        $conn->close();
    }

    sendResultInfoAsJSON(json_encode($results));
?>