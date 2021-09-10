<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<div>
  <div id="contact-header">
    <text> Contacts </text>
  </div>
  <hr>

  <div id="search-div">
      <div id="actions">
      <input id="search"/>
      <button id="addContact"/>
    </div>
</div>
</div>
  
</div>
</body>
</html>