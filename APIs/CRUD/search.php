<?php
include 'util.php';

    $inData = getRequestInfo();

    $searchResults = "";
    $searchCount = 0;

    $connection = db_connection();

    if ($connection->connect_error) {
        returnWithErrorContact($connection->connect_error);
    else
    {
        // Search through first and last names that belong to the user. Parenthesis for unambiguity!
        $sql = "SELECT FROM Contacts WHERE (firstname like '%" . $inData["search"] . "%' or LASTNAME like '%" . $inData["search"] . "%') and USERID=" . $inData["id"];
        if ($result = $connection->query($sql) != TRUE)
        {
            returnWithError("No contacts matching search");
        }
        else
        {
            $searchResults .= '"resultCount" : ' . $result->num_rows . ',';
            $searchResults .= '"results" : [';

            while($row = $result->fetch_assoc())
            {
                // Adding comma after all results besides the first
                if($searchCount > 0)
                {
                    $searchResults .= ",";
                }
                $searchCount++;

                // Writing all the result
                $searchResults .= '{';
                $searchResults .= '"contactID" : ' . $row["ID"] . ', ';
                $searchResults .= '"contactFirstName" : "' . $row["FIRSTNAME"] . '", ';
                $searchResults .= '"contactLastName" : "' . $row["LASTNAME"] . '", ';
                $searchResults .= '"contactEmail" : "' . $row["EMAIL"] . '", ';
                $searchResults .= '"contactPhone" : "' . $row["PHONE"] . '", ';
                $searchResults .= '"contactDateCreated" : "' . $row["DATECREATED"] . '"';
                $searchResults .= '}';
            }

            // End of the JSON
            $searchResults .= ']';

            returnWithInfo($searchResults);
        }
        
        $connection->close();
    }