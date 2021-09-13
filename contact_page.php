<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="/endpoints/endpoints.js"></script>
    <link rel="stylesheet" href="/components/contact_card/contact_card_styles.css">
    <link rel="stylesheet" href="/components/edit_contact/edit_contact_styles.css">
    <link rel="stylesheet" href="./pages/contact_page/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>
<div>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  This is an alert box.
</div>
  <div id="contact-header">
    <text> Contacts </text>
  </div>
  <hr>
  
  <div id="search-div">
      <div id="actions">
      <input id="search"/>
      <button id="addContact" onclick="addContact('Victoria','Williamson','1234567899','something@domain.com')">
          <text> + </text>
      </button>
    </div>
</div>
<!-- <div id="edit-contact-div" class="modify-div">
<?php  include('../../components/edit_contact/edit_contact.html')?>
</div> -->
<!-- <div id="add-contact-div" class="modify-div">
<?php  include('../../components/add_contact/add_contact.html')?>
</div> -->
<div id="contact-list">
</div>
</div>
  
</div>
</body>
</html>