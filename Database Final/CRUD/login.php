<?php
    include 'util.php';

    $inData = getRequestInfo();

	$login = $inData["Login"];
    $password = $inData["Password"];
    $uid = 0;
    $firstName = "";
    $lastName = "";

	checkUser($login, $password, " ", " ");

	$connection = db_connection();

    if ($connection->connect_error) {
        returnWithErrorUser($connection->connect_error);
    } else {
        $sql = "SELECT uid, firstName, lastName FROM Users 
        WHERE Login='" . $login . "' AND Password='" . $password . "';";
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $uid = $row["ID"];
            
            returnWithInfoUser($uid, $login, "", $firstName, $lastName, "");
        } else returnWithErrorUser("The account with the given login and password does not exist.");

        $connection->close();
    }
?>