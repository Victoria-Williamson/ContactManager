// function doAction()
// {
	
// 	// Get the values for the HTML

// 	// Create the JS object to send to the PHP and convert it to JSON
// 	var obj = 
// 	{	

// 	};

// 	var input = JSON.stringify();
	
// 	// Open up a new Request
// 	var url = urlBase + '<FileName>' + extension;
// 	var xhr = new XMLHttpRequest();
// 	xhr.open("POST", url, true);
// 	xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");

// 	// Send the Request 
// 	try
// 	{
// 		xhr.onreadystatechange = function() 
// 		{
// 			// If the request is valid :
// 			if (this.readyState == 4 && this.status == 200) 
// 			{
// 				// Get the response
// 				var jsonObject = JSON.parse( xhr.responseText);
				
				

// 				saveCookie();
	
// 			}
// 		};
// 		xhr.send(jsonPayload);
// 	}
// 	// If the request is invalid:
// 	catch(err)
// 	{
		
// 	}
// 	// Any aditional actions that need to happen after the process is complete: 
	
// }
function searchContacts()
{

}

function editContact()
{

}

function deleteContact()
{

}

function addContact(firstName,lastName,phoneNumber,userEmail)
{
    var card = document.createElement('div');
    card.id = "contact-card";

    var cardImage = document.createElement('div');
    cardImage.id = "contact-image";

    var initials = document.createElement('text');
    initials.id = "initials";
    initials.innerHTML = firstName.charAt(0) + lastName.charAt(0);

    cardImage.appendChild(initials);
    card.appendChild(cardImage);

    var user_information = document.createElement('div');
    user_information.id = "user-information";

    var name = document.createElement('text');
    name.id = "user-name";
    name.innerHTML = firstName + " " + lastName;

    var phone = document.createElement('a');
    phone.className="info";
    phone.href="tel:+" + phoneNumber;
    phone.innerHTML = "Phone: " + "(" + phoneNumber.slice(0,3) + ")"  + phoneNumber.slice(3,6) + "-" + phoneNumber.slice(6);

    var email = document.createElement('a');
    email.className="info";
    email.href="mailto:" + userEmail;
    email.innerHTML = "Email: " + userEmail;

    user_information.appendChild(name);
    user_information.appendChild(phone);
    user_information.append(email);

    card.appendChild(user_information);



    var list = document.getElementById("contact-list");
    list.append(card);
}

function pageLoad()
{
     
}