// Contains utility functions used by https://stirup.co
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
        $retValue = '{"uid":' . $uid . ',"firstName":"' . $firstName . ',"lastName":"' . $lastName . '","error":"' . $error . '"}';
        sendResultInfoAsJson( $retValue );
    }

    // Set up a JSON of the search results and print it to browser.
    function returnWithContactInfo( $uid, $cid, $firstName, $lastName, $email, $number, $error)
    {
        $retValue = '{"uid":' . $uid . ',"cid":"' . $cid . ',"firstName":"' . $firstName . ',"lastName":"' . $lastName . ',"email":"' . $email . ',"number":"' . $number .  '","error":"' . $error . '"}';
        sendResultInfoAsJson( $retValue );
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
		$obj->uid = $uid;
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
			returnWithErrorUser("Invalid login.\n");
        }
		if ((strlen($password) > 80) || ($password == NULL))
        {
			returnWithErrorUser("Invalid password.\n");
        }
        if ((strlen($firstName) > 30) || ($firstName == NULL))
        {
			returnWithErrorUser("Invalid first name.\n");
        }
		if ((strlen($lastName) > 40) || ($lastName == NULL))
        {
			returnWithErrorUser("Invalid last name.\n");
        }
	}

    // Check if contact values are valid.
	function checkContact($firstName, $lastName, $phone, $email)
    {
		if ((strlen($firstName) > 30) || ($firstName == NULL))
        {
            returnWithErrorContact("First name is invalid.\n");
        }
        if ((strlen($lastName) > 40) || ($lastName == NULL))
        {
			returnWithErrorContact("Last name is invalid.\n");
        }
        if ((strlen($phone) > 15) || (strlen($phone) < 5))
        {
			returnWithErrorContact("Contact phone is invalid.\n");
        }
        if (strlen($email) > 40 || (strlen($email) < 5))
        {
			returnWithErrorContact("Email is invalid.\n");
        }
	}
?>
