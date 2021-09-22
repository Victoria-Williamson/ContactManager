<?php

    // Establish connection with mysqli(host, username, password, database).
    function db_connect()
    {
        return new mysqli("localhost", "TheBeast", "WeLoveCOP4331", "COP4331");
    }

	// Take JSON response and convert it to a PHP variable.
	function getRequestInfo()
    {
		return json_decode(file_get_contents('php://input'), true);
	}

    // Return a raw HTTP header and print it to browser.
    function sendResultInfoAsJson( $obj )
    {
        // header('Content-type: application/json');
        echo $obj;
    }

    // Set up a JSON of the search results and print it to browser HTML.
    function returnWithInfo( $searchResults )
    {
        $retValue = '{"results":[' . $searchResults . '],"error":""}';
        sendResultInfoAsJson( $retValue );
    }

    // Set up a JSON of the user info and print it to browser.
    function returnWithUserInfo( $uid, $firstName, $lastName, $error)
    {
        $retValue = new stdClass();
        $retValue->firstName = $firstName;
        $retValue->lastName = $lastName;
        $retValue->uid = $uid;
        $retValue->error = $error;

        sendResultInfoAsJson(json_encode($retValue));
    }

    // Set up a JSON of the search results and print it to browser.
    function returnWithContactInfo( $cid, $uid, $firstName, $lastName, $email, $number, $error)
    {
        $retValue = new stdClass();
        $retValue->firstName = $firstName;
        $retValue->cid = $cid;
        $retValue->number = $number;
        $retValue->$email = $email;
        $retValue->lastName = $lastName;
        $retValue->uid = $uid;
        $retValue->error = $error;
       
        sendResultInfoAsJson(json_encode($retValue));
    }

	// Return user error as JSON.
	function returnWithUserError($error)
    {
		returnWithUserInfo(-1, "", "", $error);
	}

	// Return contact error as JSON.
	function returnWithContactError($error)
    {
		returnWithContactInfo(-1, -1, "", "", "", "", $error);
	}

	// Create a user contact object.
	function createObjectContact($uid, $cid, $firstName, $lastName, $phone, $email, $error)
    {
        $obj = new stdClass();
		$obj->uid = $uid;
        $obj->cid = $cid;
		$obj->firstName = $firstName;
		$obj->lastName = $lastName;
		$obj->phone = $phone;
		$obj->email = $email;
		$obj->error = $error;

		return $obj;
	}

	// Create user information related object.
	function createObjectUser($uid, $login, $password, $firstName, $lastName, $error)
    {
        $obj = new stdClass();
		$obj->uid = $uid;
		$obj->login = $login;
		$obj->password = $password;
		$obj->firstName = $firstName;
		$obj->lastName = $lastName;
		$obj->error = $error;

		return $obj;
	}

    // Check if user values are valid.
	function checkUser($login, $password, $firstName, $lastName)
    {
		if ((strlen($login) > 20) || ($login == NULL))
        {
			returnWithUserError("Invalid login.\n");
        }
		if ((strlen($password) > 80) || ($password == NULL))
        {
			returnWithUserError("Invalid password.\n");
        }
        if ((strlen($firstName) > 30) || ($firstName == NULL))
        {
			returnWithUserError("Invalid first name.\n");
        }
		if ((strlen($lastName) > 40) || ($lastName == NULL))
        {
			returnWithUserError("Invalid last name.\n");
        }
	}

    // Check if contact values are valid.
	function checkContact($firstName, $lastName, $phone, $email)
    {
		if ((strlen($firstName) > 30) || ($firstName == NULL))
        {
            returnWithContactError("First name is invalid.\n");
        }
        if ((strlen($lastName) > 40) || ($lastName == NULL))
        {
			returnWithContactError("Last name is invalid.\n");
        }
        if ((strlen($phone) > 15) || (strlen($phone) < 5))
        {
			returnWithContactError("Contact phone is invalid.\n");
        }
        if (strlen($email) > 40 || (strlen($email) < 5))
        {
			returnWithContactError("Email is invalid.\n");
        }
	}
?>
