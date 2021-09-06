<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../components/contact_card/contact_card_styles.css">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>
<script stype="textjavascript">
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
</script>
<div id="contact-page">
  
    <div id="list">
        
      
<div 
        id="contact-header">
        <text id="contacts"> Contacts </text>
        </div>
        <hr>
      
    <button onclick="addContact('Victoria','Williamson','1234567899','something@domain.com')"> Add Contact </button>
    <div id="search-div">
    <input id="search" placeholder="Search..."/>
    </div>
        <div id="contact-list"> 
            
    </div>
    
</div>
<div id="info"> 
<div 
        id="contact-header">
        <text id="contacts"> </text>
        </div>
        <hr>
        <div id="infoBox">
       
      
        <button id="addContact"> <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20.3125 8.59375H13.2812V1.5625C13.2812 0.699707 12.5815 0 11.7188 0H10.1562C9.29346 0 8.59375 0.699707 8.59375 1.5625V8.59375H1.5625C0.699707 8.59375 0 9.29346 0 10.1562V11.7188C0 12.5815 0.699707 13.2812 1.5625 13.2812H8.59375V20.3125C8.59375 21.1753 9.29346 21.875 10.1562 21.875H11.7188C12.5815 21.875 13.2812 21.1753 13.2812 20.3125V13.2812H20.3125C21.1753 13.2812 21.875 12.5815 21.875 11.7188V10.1562C21.875 9.29346 21.1753 8.59375 20.3125 8.59375Z" fill="white"/>
</svg>
</button>
        </div>
    </div>

</div>
</body>
</html>