<?php
    include 'util.php';

    $inData = getRequestInfo();

    $cid = $inData["cid"];
    
	$connection = db_connection();

    if ($connection->connect_error) {
        returnWithErrorContact($connection->connect_error);
    } else {
        $sql = "DELETE FROM Contacts WHERE cid = " . $cid . ";";

        if ($result = $connection->query($sql) != TRUE) {
			returnWithErrorContact("No Records Found");
		} else {
            // actually returns no error
            returnWithErrorContact("");
        }
        $connection->close();
    }
?>